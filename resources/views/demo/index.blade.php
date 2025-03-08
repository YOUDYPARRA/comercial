@extends('app')
@section('content')
<h1>PÁGINA DEMOSTRACION</h1>

     {{ $objeto->id }}

    <script>
    var loadFile=function(url,callback){ //console.log('ok');
        JSZipUtils.getBinaryContent(url,callback);
    }
    loadFile("demo/tag-example.docx",function(err,content){
        if (err) { throw e};
        var zip = new JSZip(content);
        var doc=new Docxtemplater().loadZip(zip)
        doc.setData( {"first_name":"Hipp",
            "last_name":"Edgar",
            "phone":"0652455478",
            "description":"New Website"
            }
        ) //set the templateVariables
        doc.render() //apply them (replace all occurences of {first_name} by Hipp, ...)
        out=doc.getZip().generate({
            type:"blob",
          //  mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        }) //Output the document using Data-URI
        saveAs(out,"output.docx")
    })
    </script>
    
    <!--<script>
var loadFile = function(url,callback) {
    JSZipUtils.getBinaryContent(url,callback);
}
loadFile("demo/tag-example.docx", function(err, content) {
    if (err) { throw e };
    doc = new Docxtemplater(content);
    doc.setData({
        "first_name": "Hipp",
        "last_name": "Edgar",
        "phone": "0652455478",
        "description": "New Website"
    }); //set the templateVariables
    doc.render(); //apply them (replace all occurences of {first_name} by Hipp, ...)
    out=doc.getZip().generate({type:"blob"}); //Output the document using Data-URI
    saveAs(out,"output.docx");
});
</script>-->
@endsection