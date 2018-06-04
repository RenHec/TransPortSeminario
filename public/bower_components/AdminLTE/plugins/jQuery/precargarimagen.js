function archivo(evt) {
      var files = evt.target.files;
      var fileSize = $('#avatar')[0].files[0].size;
      var siezekiloByte = parseInt(fileSize / 1024);
      if (siezekiloByte >  $('#avatar').attr('size')) {
          alert("Imagen muy grande");
          return false;
      }else{
        for (var i = 0, f; f = files[i]; i++) {
             if (!f.type.match('image.*')) {
                  continue;
             }
             var reader = new FileReader();
             reader.onload = (function(theFile) {
                 return function(e) {
                    document.getElementById("list1").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '" width="75" height="75"/>'].join('');
                 };
             })(f);
             reader.readAsDataURL(f);
         }
      }
}
  document.getElementById('avatar').addEventListener('change', archivo, false);

