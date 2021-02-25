<?php
 $content = 'admin';
include '../auth/Sessionpersist.php' ;
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>

<body>

<?php
  include '../components/navbaradmin.php';
  ?>
  <section class="section">
    <div class="container">
      <div class="notification is-primary">
        <strong>เพิ่มห้องประชุม</strong>
      </div>
      <form action="../function/addnewroom.php" method="POST" enctype="multipart/form-data">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">ชื่อ</label>
        </div>
        <div class="field-body">
          <div class="field">
            
              <input class="input" type="text" name="roomname" placeholder="Name">
             
          </div>
        </div>
      </div>
      
      
      
      
      <div>
      <label for="favcolor">เลือกสีที่ใช้แสดงในปฏิทิน</label>
      <input type="color" id="favcolor" name="bgcolor" value="#ff0000">
      </div>
      
      
      
      
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">ความจุห้อง</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input class="input" type="number" name="roomcap" placeholder="number">
            </div>
            <p class="help-number">
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
  <div class="field-label">

    <label class="label">คอมพิวเตอร์มีหรือไม่</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <label class="radio">
          <input type="radio" name="com" value='1'>
          Yes
        </label>
        <label class="radio">
          <input type="radio" name="com" value='0'>
          No
        </label>

        
      </div>
    </div>
    
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label">

    <label class="label">มีไมโครโฟนหรือ</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <label class="radio">
          <input type="radio" name="mic" value='1'>
          Yes
        </label>
        <label class="radio">
          <input type="radio" name="mic" value='0'>
          No
        </label>

        
      </div>
    </div>
    
  </div>
</div>


<div class="field is-horizontal">
  <div class="field-label">

    <label class="label">มีจอทีวีหรือไม่</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <label class="radio">
          <input type="radio" name="screen" value='1'>
          Yes
        </label>
        <label class="radio">
          <input type="radio" name="screen" value='0'>
          No
        </label>

        
      </div>
    </div>
    
  </div>
</div>


      <!-- <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">explain</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea class="textarea" placeholder="Explain how we can help you"></textarea>
            </div>
          </div>
        </div>
      </div> -->

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Image</label>
        </div>

        <div class="field-body">
          <div id="file-js-example" class="file has-name">
            <label class="file-label">
              <input class="file-input" type="file" name="resume">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
              <span class="file-name">
                No file uploaded
              </span>
            </label>
          </div>
        </div>
      </div>


      <div class="field is-horizontal">
        <div class="field-label">
          <!-- Left empty for spacing -->
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <button class="button is-primary">
                Send
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>

</body>

</html>



<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>