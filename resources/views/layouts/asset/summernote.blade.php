  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/summernote/summernote-bs4.min.css')}}">

  <!-- Summernote -->
  <script src="{{asset('assets/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

  <script>
      $(function() {
          // Summernote
          $('#summernote').summernote()
          $('.summernote').summernote({
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  //   ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['insert', ['link', 'picture', 'video']],
                  ['height', ['height']]
              ]
          });

      })

      function initSummernote(cls = 'summernote', txt = null) {
          $('.' + cls).summernote({
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  //   ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['insert', ['link', 'picture', 'video']],
                  ['height', ['height']]
              ],
              height: 300,
          });
          $('.' + cls).summernote('code', txt)
      }
  </script>