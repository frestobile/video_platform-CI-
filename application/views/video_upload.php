<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Video File</title>
</head>
<body>
<form id="videoUploadForm">
    <input type="text" id="car_number" name="car_number" placeholder="car number"> <br/>
    <input type="text" id="device_id" name="device_id" placeholder="Device ID"> <br/>
    <input type="text" id="tech_name" name="tech_name" placeholder="Tech"> <br/>
    <input type="file" id="videoFile" name="videoFile">
    <button type="button" id="uploadBtn">Upload</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#uploadBtn').click(function(e) {
            var formData = new FormData();
            formData.append('videoFile', $('#videoFile')[0].files[0]);
            formData.append('tech_name', $('#tech_name').val());
            formData.append('car_number', $('#car_number').val());
            formData.append('deviceID', $('#device_id').val());

            console.log(formData);

            $.ajax({
                url: '<?= base_url("backend1/upload_video"); ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    resp = JSON.parse(response);
                    if (resp.error == false) {
                        alert(resp.msg);
                    } else {
                        alert(resp.msg);
                    }
                    
                },
                error: function(e) {
                    console.log(e);
                    alert('Upload Failed');
                }
            });
        });
    });
</script>
</body>
</html>