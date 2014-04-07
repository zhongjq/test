<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="welcome">
		


<form method="post" action="somepage">
    <textarea name="content" style="width:100%"></textarea>
</form>
	</div>
</body>
</html>

<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>


<script type="text/javascript">
function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: '/elfinder/tinymce',// use an absolute path!
    title: '素材空间',
    width: 900,
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}

tinymce.init({
	selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality"
    ],
	file_browser_callback : elFinderBrowser,
	edit : {
      mimes : ['text/plain', 'text/html', 'text/javascript'], //types to edit
      editors : [
        {
          mimes : ['text/html'],  //types to edit with tinyMCE
          load : function(textarea) {
            tinymce.execCommand('mceAddEditor', false, textarea.id);
          },
          close : function(textarea, instance) {
            tinymce.execCommand('mceRemoveEditor', false, textarea.id);
          },
          save : function(textarea, editor) {
            textarea.value = tinyMCE.get(textarea.id).selection.getContent({format : 'html'});
            tinymce.execCommand('mceRemoveEditor', false, textarea.id);
          }
        }
      ]
    }
});
</script>