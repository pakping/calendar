<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>

<body>

  <?php
  include '../components/navbaradmin.php';
  ?>

  <section class="section">
    <div class="container">
      <div class="notification is-primary">
        <strong>Create a meeting room</strong>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Name-Room</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded has-icons-left">
              <input class="input" type="text" placeholder="Name">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
        </div>
      </div>



      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Capacity of people</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input class="input" type="number" placeholder="number">
            </div>
            <p class="help-number">
              please enter a number
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
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
      </div>

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