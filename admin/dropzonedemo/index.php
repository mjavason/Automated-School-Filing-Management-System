<html>

<head>

    <!-- 1 -->
    <link href="dropzone/dropzone.css" type="text/css" rel="stylesheet" />

    <!-- 2 -->
    <script src="dropzone/dropzone.js"></script>


</head>

<body>

    <!-- 3 -->
    <form action="upload.php" class="dropzone" id="dropzoneOne"></form>
    <script>
        Dropzone.options.dropzoneOne = { // camelized version of the `id`
            // previewsContainer:true,
            autoProcessQueue: false,
            addRemoveLinks: true,
            maxFiles: 1,
            paramName: "file", // The name that will be used to transfer the file
           // maxFilesize: 3, // MB
            acceptedFiles: 'image/*,application/pdf',
            init: function() {
                var submitButton = document.querySelector("#upload_all_files")
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                    //console.log('upload finished.');
                });

                // You might want to show the submit button only when 
                // files are dropped here:
                this.on("addedfile", function() {
                    // Show submit button here and/or inform user to click it.
                });

            }
            // accept: function(file, done) {
            //     if (file.name == "justinbieber.jpg") {
            //         done("Naha, you don't.");
            //     } else {
            //         done();
            //     }
            // }
        };


        // Dropzone.options.myDropzone = {

        //     // Prevents Dropzone from uploading dropped files immediately
        //     autoProcessQueue: false,

        //     init: function() {
        //         var submitButton = document.querySelector("#submit-all")
        //         myDropzone = this; // closure

        //         submitButton.addEventListener("click", function() {
        //             myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        //         });

        //         // You might want to show the submit button only when 
        //         // files are dropped here:
        //         this.on("addedfile", function() {
        //             // Show submit button here and/or inform user to click it.
        //         });

        //     }
        // };
    </script>
    <button type="button" id="upload_all_files">Submit Everything</button>
</body>

</html>