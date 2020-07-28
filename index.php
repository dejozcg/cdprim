<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php 
    include "db.php";
    include "funkcije.php";
    // require_once('db.php');
    // require_once('funkcije.php'); 
    ?>
    <div class="testbox">
    <form action="validator.php" method="POST" id="myForm" enctype="multipart/form-data">
        <div class="banner">
          <h1>Baner ili slika od DIZAJNERKE</h1>
        </div>
        <br>
        <?php findAllCategories(); ?>
        <!-- Kategorija: <input type="text" name="kategorija" class="form-group" id="" required>
        <span class="error-kategorija error">Missing Name</span> -->
        <br>
        opstina: 
        <br>
        <select id="" name="opstina">
            <option value="podgorica">Podgorica</option>
            <option value="danilovgrad">Danilovgrad</option>
            <option value="budva">Budva</option>
            <option value="bar">Bar</option>
        </select>
        <span class="error-opstina error">Missing Email</span>
        <br>
        opis nepravilnosti: <textarea id="" name="opis" rows="4" cols="50" required></textarea>
        <span class="error-opis error">Missing Email</span>
        <br>


Post Image: <input type="file" name="attachment" id="myImg"> 

        <br>

        Name: <input type="text" name="name" class="form-group" id="">
        <span class="error-name error">Missing Name</span>
        <br>
        Email: <input type="email" name="email" class="form-group" id="">
        <span class="error-email error">Missing Email</span>
        <br>
        <button type="submit">Submit</button>
        <div id="message"></div>
    </form>
</div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            $('button[type=submit], input[type=submit]').prop('disabled',true);
            $('.error').hide();
            $('#message').html('Sending....');
            // var data = $('#myForm').serialize();
            
            var form = $('#myForm')[0];
            var data = new FormData(form);
            
            console.log(data);
            $.ajax({
                type: 'POST',
                url: 'validator.php',
                data,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(d){
                    $('button[type=submit], input[type=submit]').prop('disabled',false);
                    console.log(d);
                    if(d.success){
                        $('#message').html(d.message);
                    }else{
                        $('#message').html(d.message);
                        // if(d.errors.name){
                        //     $('.error-name').show();
                        //     $('.error-name').html(d.errors.name);
                        // }
                        // if(d.errors.email){
                        //     $('.error-email').show();
                        //     $('.error-email').html(d.errors.email);
                        // }
                    }
                    // if(!d.success){
                        // Object.entries(d).forEach(function(value, key){
                        //     console.log(value, key)
                        // });
                        //console.log(d.errors)
                    // }
                }
            })
        })
    })
    </script>
</body>
</html>