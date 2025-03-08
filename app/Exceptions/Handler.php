<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        switch ($e) {
            case ($e instanceof ErrorException):
                # code...
               return response()->view('errors.202', [], 202);
                break;
            case ($e instanceof ModelNotFoundException):
                //dd('err');
               return $this->renderException($e);
                break;
            default:
                if($this->postgresError($e)){
                  return back()->withErrors([$e->getMessage().' Favor de Verificar']);
                }else if($this->divisionZero($e) ){
                  return back()->withErrors([$e->getMessage().': Favor de verificar configuración de producto']);
                }
                return parent::render($request, $e);
                break;
        }
    }

      protected function divisionZero($e){
        $error=false;
        if($e->getMessage()=='Division by zero'){
          $error=true;
        }
        return $error;
      }
      protected function postgresError($e){
        $error=false;
        if($e->getFile()=='/var/www/html/comercial/app/Services/PgManager.php'){
          $error=true;
        }
        return $error;
      }
      protected function renderException($e)
   {

      switch ($e){

          case ($e instanceof ModelNotFoundException):
               return response()->view('errors.204', [], 204);
              break;

          case ($e instanceof ReallyFriendlyException):
              return response()->view('errors.friendly');
              break;
          default:
              return (new SymfonyDisplayer(config('app.debug')))
                     ->createResponse($e);

      }

   }
}
