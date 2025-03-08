'use strict';
angular.module('cotizacionApp')
.controller('custodiaPdfCtrl',function (custodiaSrc,$scope){

    var entradaEquipoServicioSmh = {
     pageSize: 'letter',
pageOrientation: 'portrait',                  
    pageMargins: [ 20, 80, 40, 140 ],              //
    header:{ style: 'texto',
                  margin: [20,20],
                 // background:'blue',
                   table: { widths: [180,180,180],
                    body: [//                                        [{image:'smh',width:160,rowSpan:'5',alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \n SUM890327137\nDIAGONAL EXTERIOR 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:11, bold: true, alignment:'right',background:'blue'}],
                    [{image:'smh',width:100,alignment:'bottom',rowSpan:2},{text:'ENTRADA DE EQUIPO',bold:true,alignment:'center',rowSpan:2},{text:"FR-07-11",fontSize:8,alignment:'right'}],
                    [{},{},{text:"Edición 0",fontSize:8,alignment:'right'}],
                   ]
                  },                   layout: 'noBorders'
                 },
        content:[
                { style: 'texto',//0
                  margin:0,          
                   table: { widths: [40,40,45,45,45,45,45,45,40,40], 
                 headerRows: 1,
                    body: [//                                        [{image:'smh',width:160,rowSpan:'5',alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \n SUM890327137\nDIAGONAL EXTERIOR 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:11, bold: true, alignment:'right',background:'blue'}],
                    [{text:'FECHA:',fontSize:10,bold:true,alignment:'right'},{text:'00-00-0000 00:00:00',fontSize:10,alignment:'left',colSpan:2},{},{text:'REPORTE:',fontSize:10,bold:true,alignment:'right',colSpan:2},{},{text:'0000',fontSize:10,alignment:'left',colSpan:2},{},{text:'FOLIO:',fontSize:10,bold:true,alignment:'right'},{text:'/',fontSize:10,bold:true,alignment:'left',color:'red',colSpan:2},{}],
                    [{text:''},{text:'GARANTIA',fontSize:10,bold:true,alignment:'center'},{text:'__',bold:true},{text:'CONTRATO:',fontSize:10,bold:true,alignment:'center'},{text:'__',bold:true},{text:'FACTURABLE:',fontSize:10,bold:true,alignment:'center'},{text:'__',bold:true},{text:'OTROS:',fontSize:10,bold:true,alignment:'center'},{text:'__',bold:true},{text:''}],
                    [{text:'_______________________________________________________________________________________________________________________________________________________________',fontSize:8,bold:true,alignment:'center',colSpan:10},{},{},{},{},{},{},{},{},{}],
                   ]
                  },                   //layout: 'noBorders'                   //layout: 'lightHorizontalLines'
                    layout: 'headerLineOnly'
                 },
                 { style: 'texto',//1
                  margin:0,             
                   table: { widths: [40,40,45,45,45,45,45,45,40,40], 
                 headerRows: 1,
                    body: [//                                        [{image:'smh',width:160,rowSpan:'5',alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \n SUM890327137\nDIAGONAL EXTERIOR 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:11, bold: true, alignment:'right',background:'blue'}],
                    [{text:'DATOS DEL CLIENTE',fontSize:10,bold:true,alignment:'left',colSpan:10},{},{},{},{},{},{},{},{},{}],
                    [{text:'NOMBRE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'CONTACTO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},	{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'TELEFONO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},	{text:'',fontSize:8,bold:false,alignment:'left',colSpan:4},{},{},{},{text:'CORREO:',fontSize:10,bold:true,alignment:'left'},{text:'',fontSize:8,bold:false,alignment:'left',colSpan:3},{},{}],
                    [{text:'CALLE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'COLONIA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:4},{},{},{},{text:'CP.:',fontSize:10,bold:true,alignment:'left'},{text:'',fontSize:8,bold:false,alignment:'left',colSpan:3},{},{}],
                    [{text:'CIUDAD:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:4},{},{},{},{text:'ESTADO:',fontSize:10,bold:true,alignment:'left'},{text:'',fontSize:8,bold:false,alignment:'left',colSpan:3},{},{}],
                    [{text:'_______________________________________________________________________________________________________________________________________________________________',fontSize:8,bold:true,alignment:'center',colSpan:10},{},{},{},{},{},{},{},{},{}],
                   ]
                  },                   //layout: 'noBorders'                   //layout: 'lightHorizontalLines'
                    layout: 'headerLineOnly'
                 }, 
                 { style: 'texto',//2
                  margin:0,                 // background:'blue',                   //table: { widths: [45,45,45,45,45,45,45,45,45,45], //borders
                   table: { widths: [40,40,45,45,45,45,45,45,40,40], 
                 headerRows: 1,
                    body: [//                                        [{image:'smh',width:160,rowSpan:'5',alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \n SUM890327137\nDIAGONAL EXTERIOR 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:11, bold: true, alignment:'right',background:'blue'}],
                    [{text:'DATOS DEL EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:10},{},{},{},{},{},{},{},{},{}],
                    [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},			{text:'',fontSize:8,bold:false,alignment:'left',colSpan:4},{},{},{},{text:'MARCA:',fontSize:10,bold:true,alignment:'left'},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:3},{},{}],
                    [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},			{text:'',fontSize:8,bold:false,alignment:'left',colSpan:4},{},{},{},{text:'N/S:',fontSize:10,bold:true,alignment:'left'},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:3},{},{}],
                    [{text:'ACCESORIOS:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},		{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'TRANSDUCTORES:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},	{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'CABLES:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},			{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'OTROS:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},			{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'EMPAQUE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},			{text:'',fontSize:8,bold:false,alignment:'left',colSpan:8},{},{},{},{},{},{},{}],
                    [{text:'DESCRIPCION DE LA FALLA:',fontSize:10,bold:true,alignment:'left',colSpan:10},{},{},{},{},{},{},{},{}],
                    [{text:'',fontSize:8,bold:false,alignment:'justify',colSpan:10},{},{},{},{},{},{},{},{}],
                   ]
                  },                   //layout: 'noBorders'                   //layout: 'lightHorizontalLines'
                    layout: 'headerLineOnly'
                 }, 
                 
                ],
          footer:{ style: 'texto',
                  margin:20,                 // background:'blue',                   //table: { widths: [45,45,45,45,45,45,45,45,45,45], //borders
                   table: { widths: [40,40,45,45,45,45,45,45,40,40], 
                 headerRows: 1,
                    body: [//                                        [{image:'smh',width:160,rowSpan:'5',alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \n SUM890327137\nDIAGONAL EXTERIOR 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:11, bold: true, alignment:'right',background:'blue'}],
                    [{text:'RECEPCION DE EQUIPO',fontSize:10,bold:true,alignment:'center',colSpan:5},{},{},{},{},	{text:'ENTREGA DE EQUIPO',fontSize:10,bold:true,alignment:'center',colSpan:5},{},{},{},{}],
                    [{text:'CLIENTE',fontSize:8,bold:true,alignment:'center',colSpan:5},{},{},{},{},				{text:'CLIENTE',fontSize:8,bold:true,alignment:'center',colSpan:5},{},{},{},{}],
                    [{text:'NOMBRE:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{},	{text:'NOMBRE:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{}],
                    [{text:'FIRMA:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{},	{text:'FIRMA:',fontSize:8,bold:false,alignment:'left'},		{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{}],
                    [{text:'SMH',fontSize:8,bold:true,alignment:'center',colSpan:5},{},{},{},{},					{text:'SMH',fontSize:8,bold:true,alignment:'center',colSpan:5},{},{},{},{}],
                    [{text:'NOMBRE:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{},	{text:'NOMBRE:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{}],
                    [{text:'FIRMA:',fontSize:8,bold:false,alignment:'left'},	{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{},	{text:'FIRMA:',fontSize:8,bold:false,alignment:'left'},		{text:'____________________________________________________________',fontSize:8,bold:true,alignment:'left',colSpan:4},{},{},{}],
                    [{text:'TELEFONOS SERVICIO TECNICO:(0155) 5687-6175, 5687-6164, 5687-6166',fontSize:8,bold:true,colSpan:10},{},{},{},{},{},{},{},{},{}],
                   ]
                  },                   //layout: 'noBorders'                    ////layout: 'lightHorizontalLines'
                  layout: 'headerLineOnly'
                 },
         images:{
                  smh:'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAYEBAQFBAYFBQYJBgUGCQsIBgYICwwKCgsKCgwQDAwMDAwMEAwODxAPDgwTExQUExMcGxsbHCAgICAgICAgICD/2wBDAQcHBw0MDRgQEBgaFREVGiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICD/wAARCABZAP0DAREAAhEBAxEB/8QAHAAAAgMBAQEBAAAAAAAAAAAAAAYEBQcCAwEI/8QAThAAAQMDAQMECg8GBQMFAAAAAgEDBAAFEQYHEiETIjFBFBUyNlFhcXSxshcjMzQ1QlJjcnOBkZOhs5KiwcLD4RZTVILRJEN1RFVig9L/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAqEQEBAAIABQEIAwEBAAAAAAAAAQIRAxIxMoFBBFFhcXKCscEUkaHwIv/aAAwDAQACEQMRAD8Ak10YFAUBQFAUG+7PVVdH27PyF9Za51uGOgKAoCgKAoCgKAoCgKAoCgKAoCgKAoCgKAoCgKAoCg/L9dGBQFBdQ9G6omxW5UW3uOx3U3m3EUeKfatTZpGuOnb3bnmWZsM2XZHuIrjnY8GFXw1vGblvuRBRl4kFUBVQhIx8YhneX7MVu8HL/vinM1rSWuLFatNxokozR6NH5ZxBHPNI8Jjx85Kz/Hy3501zw1WbVdou8x+JDIidjiJnlMJg0ymK55cOyb97UyXNYVTXnV+nrPzZ0sRd/wAkeef7I5WgWn9senwJUaiyHU+VgR9K1dJtHTbRa97jbn936QU5TadD2u6YeLDwPxvGY7yfuKtNGzZbbvbLmzy0GQEhvwguceVOqoqZQKl02l6cts96C+rqvMLuubgZTNXSbRPZc0r8/wDh/wB6aNj2XNK/P/h/3po2ZbFfrfe4KTYJKTWVFUJMKip1KlRVjQUGotbWSwPtsTiNXXB3kBsd7h4VpoVHsuaV+f8Aw/71dJsey5pX5/8AD/vTRtc6c1nZtQOOtwVPfZRCNDHd4LU0ry1Drux2KYMSarnLECOYAc8F6PRV0Kv2XNK/P/h/3ppNp1l2i6eu9wbgRVdR93O5vhhFwmemml2aKgKBPmbUtMRZb0Y1eU2TVs1EOGRXC1dJt4+y5pX5/wDD/vTRtc2HWdmvYPFDU/aFRDQxx3Wceior8+V0YFAUH6B0H3oWv6lK51uFfah8Paf+kfpGvTwOzP5OefWM8j+94vmcv+pXtz636sXKfquT97u+YNfqhVnd99T08HvZZ3yXPzdj1Urx8fsx8/l1w61abS9avWlsbZbz3Jz47zjqdLYeLxrXlkdLWPOOG4ZOOEpmS5IiXKqvjWtsvrTTrpo20BOGvQAoqr9yUHrIt1wjJvSYzrIr0K4BCn5olBHoJtovFwtM0JcF1W3R6U+KSeAk60oN/wBNX1i+Wdi4NcN9MOB8k04En31zbYfrfvsun1y+hK3GKo6oKDTNjNzw9OthL3SI+0nk5pfwrOTUapWVYFtBunbDVc0xXLbK8g35G+C/vZrcZpcqoKDRdjHwrcPqQ9ZazksQtr3fUHmzfrFTEpHrSGXZx3527yn+mVSrG91hoUH5uv3w5cPOXvXWukYqBQaJsn9zuflZ/nrOTUZ3WmV1pbS8nUU5yJHeBkmw5RSPK9eOry1LVNPsM3j/AF7H7JVOY003T9rK1WaJbyPlCjtoCmnDOKy0qdV6RdvdxtsoH0aGCRKYqmd7OOj7q64cTllnvZuOydc9m8i1WZyYcwXEgxJCEKCqb2/vYx+1XontHNl87GOTUJR+93fMGv1Qr1Tu++uXp4Peyzvkufm7HqpXj4/Zj5/Lrh1pV2jE8usbhyvUooH0dxMV543S1VQ5bOtV2ewyJHbBlfb93dlCm8oonVjpx5KlixpzWq9HXdpWOzWHRcTdVl3mqufEWKw0zS6bMr6t0kJamgegKarHc5Qe5Xjjw8OitbZ05b2TauPpFgPpOf8ACLV5jTQNnmmbvp+DJjzzbJHXEcbFtVLHDC9KJ4KzVjKNb99l0+uX0JWozVHVH0m3AwjiYJUQvsJMp+S0F7oa59rtUwX1XDZnyLn0XOb6cVKsbpe7g3b7RLmn3LDRH+XCsNPze44bjhOGuTNVIl8a8Vrow+cm4ocoie1iqCS+MkXHooPlBouxj4VuH1IestZyWIW17vqDzZv1ipiUj1pDJs7cBvWFvIyQRRTySrhO4WpVjdO2ED/UNftjWGh2wgf6hr9saD863wkK9XAhXKLJdwqfTWukYQaDRNk/udz8rP8APWcmozutMnfZPPhQ75IclvgwCsKiE4SCirvJ4azksav/AIl09/7jH/EH/mstLBp1t1sXGyQ2y4iScUVKDh6XFYMAedFsnODYkqIpeSgoNYXO3vaVuYNSWzNyK6rYiSKpYTjjyV04U/8AU+bOXRi5+93fMGv1Qr6c7vvrz+ng97LO+S5+bseqlePj9mPn8uuHWp207RUm44vFuDlJLQ7shhOkwToJPGleWV0sZGQkKqJJgk4Ki1tl8oCgmQLxdbeaHClusKnUBKifd0U0HbT+1y5RzFq8NpKY6FfBN1xPHjoWs8q7arbrjDuMNuXDcR1h1MiaVlpgmt++y6fXL6ErcZqjqoYdVWzseFZJwpzJkFvP020wv5KlSLS+iqKoqcFTii1UaprrUoydA29QL2y5bm+if/Dif5pisRqsqrbJhl2zsbRMKYSc+bMMv9oAop+eanqpeqo0XYx8K3D6kPWWs5LELa931B5s36xUxKR60goCgKAoCg0TZP7nc/Kz/PWcmozutMigKD9BaE70bX9Slc62V9p6ql+0/hfjH6Rr08Dsz+Tnn1jPI6r2PF4/+jl/1K9ufW/Vi5T9Vwfvd3zBr9UKs7vvqeng97LO+S5+bseqlePj9mPl1w61pyvMp3RinlVK8jqWtQ6a0XdcuTVZaf8A9Q2Ygf2+H7aBPmbHnHA5a03IHmi4gjidX0x4flWuZNFy47O9WQBIzh8s2PSbC7/5d1+VXaaLZCQkokiiScFFeCotVHyg0HZBenmbs7aiLMeSCuAPgcHweVKzksLWt++y6fXL6Eqwqjqo0/Ulr7K2W2mUKc+E005/tJN0vTmsTq1WYVtlJfuMh+HFhn7jE3+S/wDsXeWg8GwJwxbBMkaoIp41oNK2mW8LdpSxwh6GCQPt5PjWY1WZ1plouxj4VuH1IestZyWIW17vqDzZv1ipiUj1pEu1WyXdJ7UGIiFIezuIS4Tgmen7KBl9irWH+S1+In/FTmXQ9irWH+S1+In/ABTmNFOQw5HkOx3Uw6yRAadPEVwtVHnQaJsn9zuflZ/nrOTUR12O6jzwfjKnUu8X/wCacyaLd90vcLNcCgySbJ0WeyFUFXG7x8XTwrvw+FzTfx0xldK1yI82JEuMA2Dq8fiuY3fWrc9nt/uz+k52lWPaKzZ7SzbDiK4cI2oxGhcF3kXJfZisT2e3+ttc6r1LqhvUF2tToMqz2NJdZwq5zjdXNdceHy45fHGM3LdnzLMf3vF8zl/1K9GfW/VixP1XJ+93fMGv1Qqzu++p6eDxszDlL9dwzjeitJnyilePj9mPn8uuHWs+uQTI86RFkGauMuEBbyr1LiuDSJQanst1jAagdpZ7yMuNkqxTPgJCXHdz4UWs2NRpCyYyBvq6CB8reTFZVh20ifaZupXHbaokCAIvOh3JOJnK+PhwzW4zSrVQ6bJ4br+qheFPa4zRka/S5qJUyWKfW/fZdPrl9CUiVR1RvVhgBP2fxIR9y/BQPvGubbCHmjZdNo0wbZKBJ4xXC10YcUDFoC19sdVQmlTLbRcu55G+KfvYqVYeNtHwXb/r19RazitZLW2Wi7GPhW4fUh6y1nJYhbXu+oPNm/WKmJSPWkMuzjvzt3lP9MqlWN7rDQoPzdfvhy4ecveutdIxUCg0TZP7nc/Kz/PWcmo1ysqyHaf32O/+NX0lXv8AZu37448Tr4KEz3J7zOL6G69GHWfVkxl+o9JfviV54z6DrGHSfTVv7ekL37F/8g76AqZ9t+iE6+XlH97xfM5f9St59b9WKT9Vyfvd3zBr9UKs7vvqeng97LO+S5+bseqlePj9mPn8uuHWpG0vQj8twr1bG997H/VsD0lj44+FfDXlldLGUqioqovBU6UrbL5QdK64o7qmu78nPCg5oJdstU+5yhiwWSeeLqHq8ar1JQbporSbOnbZySqhzHudJdTw/JTxJXOtsc1v32XT65fQlbjFUdUfoXRXenavNm/RXNtj+0S19r9VyxFMNyMSG/8Af0/vItbjNLVVGobGbX7+uhJ4I7S/vF/Cs5NRK20fBdv+vX1FqYlZLW2Wi7GPhW4fUh6y1nJYhbXu+oPNm/WKmJSPWkMuzjvzt3lP9MqlWN7rDQoPzdfvhy4ecveutdIxUCg0TZR7nc/Kz/PWcmo1zNZVRXnRllu80pksTV4mVjqoljmL/HjXTHi5Y9Pftm4yoLmzPTDgmKg5z222l569y1jHq1qe0ZJyR9c2baZM3DVs8uOi8XOXug6Ps41Jx8v80vJH1vZxppt0HBbPebeJ8ecvdF0/ZwpePl/mjkjkNmumQFsUBzDbbjSc9e5dzvestW8fL/vgckcns20tyaiQmiGyMfu/iiqEn25Sn8jL/dpyRaWbSlotEx+XDEhdkCIHlcpgEwmKxlxLZr3NTFc1hVHeNF6buxKcuGPLL0vBzD+1RxmgXX9jmnz9ykyGvFkS9KVdppHTYvbM8bi/j6IU5jSfE2R6XZJFeV6TjqM91P3cU2aNdttNstrPIwI4MN9aAmPvXrqKmUCpdNmum7lPenPi6jz67zm4aomfJV2mkX2I9J/P/iLTZo2wITEGEzDjphhgUBtF48EqKqdRaLsl/daenCfKtJuibZbq48C02Kj2I9J/P/iVdpoy2SxwLLAGDBFRZFVLnLlVVelVWorx1Fpq13+O3HnoSi0W+G4W6ueigoPYj0n8/wDiVdppcad0bZtPuOuQEPfeRBMjLe4JUV5ag0LYr7MGXNRzlhBAyBbvBOj002Kz2I9J/P8A4lXaaTbNs707aJ7c+KjnLtZ3FM8omUxTa6M4kJJkVynhSoDKeGgUZmy3S8uW7JcF5HHiUzQTVEyS5WrtNPH2I9J/P/iU2aXFh0bZrIDwQhP29UU1Mt5eb0emopcsuo7qy6VtiMpKkyH5LguOmqCIgfR11UTmda3aYQsQbePZCMk8/wAoeBHcJRJEwnHo4VFdDrS4zQ3rXCFxWGEkTEcPdxn4g46V4UHbGv2HbdMmdjqnY6Nk0CrxPlej97hQcrrS4MSWDmQhYhSHeQBFP27Pytz5NB5SdUXSRbXJL1vVLVLbc5F1o/bBQUXCnw5u9iqIk28SZKtzWIavW6xbhP7zmFIlBFXCfGUEXroie5rW4L2RLYhCVsiOg286R88kPHEEx1b1RV9dLykBYKk3vNS3UZI/kbyc1fv4UHFtvnZgz3OS3WoThNoXTv7icVoKKNrmasYp8iEPa8wMmTaPeIVBcILngUqo5f1zcYLZJNhAr5gLsZtlzeyhEg7pL1KmUoJo6ukR2Z43GOLUuE0LwtgWUNHO5RF8vCoK226ok7ywrbFU7jKfdMgfcXcBB7pc9OM8ESqgLVhszjkOwnW7iTItJGI+ZyiubiIieDPHe8FBe2S+TZFwkWy5MCxOYEXE5Mt4CAutM46Kiq+5aylMy5nYkcHYdtVEmEZ7pqq9PJp14oPL/G1wJHZjcEe1cd9GHXFPnrvKnOFMeOgu7/fFtsVkmW0dkyjRqOBLujvF1kvgRKCk/wAaz1NLaMVsr2r3I8mh+043d/f3vBigkWnWMiVcQt8mHyEjlzjuYLKZbBCyniXNBW3HWTTE92b2MZOwxebEEPmluOIPR4VzVRLPWs+CphdIQg6bKPwxaLe395UFAXPQuVSormVre427lY9yhthNUQcjIB+1qjhbvOJejdVeNUXliulwmA+E+MjDzC43wXebNFTOQWoF9zXN3xy7VvAoqylhN5Pnq5nCF0dzVHcnVlwdjv2t2OLd3J7sTAuYb4hv76GvRgag87ZqWUwxGslvhAtybMmSAnMtIjaZU9/pXOaqKW0aj7DnPypwOq+25KXk9/moqKibmOvj0UDG7q28wm1S4W1EeeQFhcmWQInFwgEq9Cpmoryk64uMJw4EyG2F032xawftKo70EpLxTGKoYbFcZs2M4syP2PIZNWyRFyBY+MC9aLUC1YtOXaLfglPNbrKdlZLKf9w8j96VUemn9PXSJMfcfbQQNh0BXPxidIk/Jaiq6BbNRWMHUCAslZ7CNLuEntbiZTneLC1Ueg6KujLlnZDBM7iJcS6kJsuUDh18VxQVzmnr6bjTTtuJ2Y1L5STcSJF321XhuZ6sL0UFo2xqsrR2gCDyQMNONvSCVN11MLuIHloOFt2ooMWfaWYCvDdEFW5KEm62qggnv+TFBMHTVzb0/c4It5defAmOPdCKAmfyqKttXxwPS8lDJGzZbRxss4w43xH80oDS0KRG0wyPRLfBXi3v8xzncfvoFF/Tl6uRONhbuwHeSNJxb2GZB9I7op4V45qo9u0NxmtL2NZgt6No2Jb2OUMkNFJUX5KIn20FxqfTk6ddrc9GBFZLDVwXo9rEkNPzSoqtbs18tF27btQ1kijr4qwCpvcm4uRJKqOZ1i1RNkds5DA9kgIOgyKp8RzeRvy7nX4aC7sEa4zL9JvcyMUMSZGOyyfdLhcqq4qKpLjp2azdrigWoJxXBxHIss+4bz3W+niqonLp26doJ8RGk5Z2WjrYovDcQk4/lUVP1jaH5kGE41HSWsJ0XHIvyxxhUTx0FC3ZroxIj32NakZGO+pDbwwjqtEG7lV61zxqo8IHborm9eOwSdcjzjV6ICpviLjQon3ddBCvFlvbNumT5UdGd/lS3d5FwrroqKUFpMtd/v6pL7DWKsKOIsC4qe2uCSFw8XNoO5kS/wBzmldytm6MdkWFhPYVXRUsuY6ujooLjRlvnx+znDZOJBfNFhwnC3ib4c7yIq9VRVe3pu7pbWWVa9sG6dkqmU9y385qjwvOmp63eTczg9msBLR1I6LxcbVpAXHkWiPka2XmBJjXti1oAIbglb2sI4LRoiIq+EspxoK7/B+o5ZPPOx0ZJ5ZDoipJwUyQgRfLigtp4apu7DbnYHY4W5W3G47ipvuugvOwvgxQeMqFfZ05+9u2reYIQYO3u4Vw2kypEnjz0UF7oqBcokKR2QJMMOPKcSK4u8TbfyVX+FRTJQFAUBQFAUBQFAqbR/gVjzlv+NWFNDHuLf0U9FQd0BQFAUBQFAUBQFAUFNYfft487/pjQc6z73ZX+31kpBbse4N/RT0UHpQFAUBQFAUBQFAUH//Z',
                },
         styles: {
                  headerT: {
                    fontSize: 9,
                    alignment:'center'
                  }
                },
           info: {
                title: 'reporteServicioSmh',
               author: 'EMS, JYPA',
              subject: 'reporteServicio',
             keywords: 'N/A',
                }
  };

  var clausula=[{text:'TÉRMINOS Y CONDICIONES',fontSize:8, bold:true, alignment:'center',pageBreak: 'before'},
                {text:'\n\n Para brindarle un mejor servicio le informamos lo siguiente:\n',fontSize:8, bold:true, alignment:'left' },
                {
                  ol: [
                      {text:'Usted cuenta con un plazo de 30 días naturales para retirar su equipo a partir de la fecha acordada, pasado este período, Suministro para Uso Médico y Hospitalario S.A. de C.V. no se responsabilizará por la perdida o descompostura de los equipos olvidados.',alignment:'justify',fontSize:8},
                      {text:'Una vez transcurridos los 30 días naturales a que se refiere el punto inmediato anterior, se cobrarán gastos de almacenaje por la cantidad que corresponda al 10% del total del valor total de reparación que se encuentra en la cotización que le ha sido enviada, mismo que cobrará mensualmente a partir del día siguiente al vencimiento del término concedido.',fontSize:8,alignment:'justify'},
                      {text:[{text:'Despues de 120 días de almacenamiento su equipo será depurado del almacén por causa de ',fontSize:8},{text:'abandono por parte del cliente, sin responsabilidad alguna para Suministro para Uso Médico y Hospitalario S.A. de C.V.',bold:true,fontSize:8,alignment:'justify',decoration:'underline'}]}
                      ]
                      ,fontSize:8
    },   
               ];

  $scope.openEntradaEquipoPdf = function(id) {  //console.log(id);   // console.log(consumibles.version);    console.log(consumibles.insumos);    console.log(consumibles.insumos[0].cantidad);//OK //var i=1,j=1;
	custodiaSrc.get({id_reporte:id},function(d){ console.log(d);
        
      if(d.custodia){ console.log(d.custodia.length);
        	if(d.custodia.condicion_servicio=="GARANTIA"){
        	entradaEquipoServicioSmh.content[0].table.body[1][2].text="X";	
        	}else if(d.custodia.condicion_servicio=="CONTRATO"){
        	entradaEquipoServicioSmh.content[0].table.body[1][4].text="X";	
        	}else if(d.custodia.condicion_servicio=="FACTURABLE"){
        	entradaEquipoServicioSmh.content[0].table.body[1][6].text="X";	
        	}else if(d.custodia.condicion_servicio=="OTROS"){
        	entradaEquipoServicioSmh.content[0].table.body[1][8].text="X";	
        	}
            //console.log(d.custodia.fecha_recepcion);
            //console.log(entradaEquipoServicioSmh.content[0].table.body[0][5].text);
            //console.log(entradaEquipoServicioSmh.content[0].table.body[0][1].text);
            var fecha=d.custodia.fecha_recepcion.split("-");
            var dia=fecha[2].substring(0,2);
            fecha=dia+"-"+fecha[1]+"-"+fecha[0];

            entradaEquipoServicioSmh.content[0].table.body[0][1].text=fecha;
            entradaEquipoServicioSmh.content[0].table.body[0][5].text=d.custodia.reporte;
            entradaEquipoServicioSmh.content[0].table.body[0][8].text=d.custodia.folio;
            entradaEquipoServicioSmh.content[1].table.body[1][2].text=d.custodia.nombre_fiscal;
            entradaEquipoServicioSmh.content[1].table.body[2][2].text=d.custodia.nombre_responsable;
            entradaEquipoServicioSmh.content[1].table.body[3][2].text=d.custodia.telefonos;
            entradaEquipoServicioSmh.content[1].table.body[3][7].text=d.custodia.correos;
            entradaEquipoServicioSmh.content[1].table.body[4][2].text=d.custodia.calle;
            entradaEquipoServicioSmh.content[1].table.body[5][2].text=d.custodia.colonia;
            entradaEquipoServicioSmh.content[1].table.body[5][7].text=d.custodia.c_p;
            entradaEquipoServicioSmh.content[1].table.body[6][2].text=d.custodia.ciudad;
            entradaEquipoServicioSmh.content[1].table.body[6][7].text=d.custodia.estado+" "+d.custodia.pais;
            entradaEquipoServicioSmh.content[2].table.body[1][2].text=d.custodia.equipo;
            entradaEquipoServicioSmh.content[2].table.body[1][7].text=d.custodia.marca;
            entradaEquipoServicioSmh.content[2].table.body[2][2].text=d.custodia.modelo;
            entradaEquipoServicioSmh.content[2].table.body[2][7].text=d.custodia.numero_serie;
            entradaEquipoServicioSmh.content[2].table.body[3][2].text=d.custodia.accesorios;
            entradaEquipoServicioSmh.content[2].table.body[4][2].text=d.custodia.transductores;
            entradaEquipoServicioSmh.content[2].table.body[5][2].text=d.custodia.cables;
            entradaEquipoServicioSmh.content[2].table.body[6][2].text=d.custodia.otros;
            entradaEquipoServicioSmh.content[2].table.body[7][2].text=d.custodia.empaques;
            entradaEquipoServicioSmh.content[2].table.body[9][0].text=d.custodia.nota_cliente;
            entradaEquipoServicioSmh.content.push(clausula);
            pdfMake.createPdf(entradaEquipoServicioSmh).open();                                                 
        }else{console.log("vacio");
          alert("NO HA CREADO UNA ENTRADA DE EQUIPO");
        }

  },function(e){alert('Error: '+e.status+' '+e.data);})
}

	})