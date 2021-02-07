<script>
    // jQuery image preview code with image size
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.imgpreviewbox').attr('src',e.target.result);
                const size = (input.files[0].size /1024).toFixed(2);
                if (size>100) {
                    // Swal.fire('error','Too Large File');
                }
                $('.imgsizebox').text(size+' Kb');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
        $('.imagepreview').change(function (e) {
            e.preventDefault();
            filePreview(this);
        });
    // jQuery image preview code end

        // jQuery Multistep form
        //jQuery Steps Form
    // Multistep Bootstrap Modified Version
    $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            var isValid=true;
            var inputs = $(current_fs).find('input');
            $(".form-group").removeClass("was-validated");
                $.each(inputs, function (key,input) {
                    if (!input.validity.valid){
                            isValid = false;
                            $(input).closest(".form-group").addClass("was-validated");
                        }
                });
                if(isValid){
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    $("#progressbar li").eq(current-1).removeClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                    });
                    setProgressBar(++current);
                }

                    });

            $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq(current-1).removeClass("active");
            $("#progressbar li").eq(current-2).addClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(--current);
            });

            function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%").text(percent+'%')
            }

            $(".submit").click(function(){
            if(current==steps)
            return true;
            else return false;
            })

            });
            // jQuery Multistep form
        //jQuery Steps Form
    // Multistep Bootstrap Modified Version

</script>
