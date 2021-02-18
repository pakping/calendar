<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>

<body>


  <section class="section">
    <div class="container">
      <h1 class="title">
        Hello World
      </h1>
      <p class="subtitle">
        My first website with <strong>Bulma</strong>!
      </p>
    </div>
  </section>
  <div class="container">
    <div class="notification is-primary">
      This container is <strong>centered</strong> on desktop and larger viewports.
    </div>
  </div>
  <section class="section">
    <h2 class="title is-size-6-mobile is-size-2-tablet">เบจิต้า</h2>
    <div class="columns is-mobile is-multiline is-variable is-1">


      <div class="column is-6-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">
          <div class="card">

            <header class="card-header">
              <p class=" title is-5 card-header-title ">ห้องประชุมที่1&emsp;&emsp;
                <span class="tag is-normal is-danger">รับได้ 50 ท่าน</span>
              </p>
            </header>

            <div class="card-image">
              <figure class="image is-4by3">
                <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
              </figure>
            </div>
            <div class="card-content">
              <div class="content">
                <div class="tags are-medium">
                  <span class="tag is-large is-primary">คอมพิวเตอร์</span>
                  <span class="tag is-large is-link">จอทีวี</span>
                  <span class="tag is-large is-purple">ไมโครโฟน</span>
                </div>
                <br>
                <time datetime="2016-1-1"><a href="#"># PM - 1 Jan 2021</a></time>
              </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </div>
      </div>




      <div class="column is-6-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">ไข่ย้อย 2</div>
      </div>

      <div class="column is-6-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">ไข่ย้อย 3</div>
      </div>

      <div class="column is-6-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">ไข่ย้อย 4</div>
      </div>

    </div>
  </section>


</body>

</html>

<style>
  .tag:not(body).is-purple {
    background-color: hsl(294, 71%, 79%);
    color: #fff;
  }
  @media screen and (max-width: 900px) and (min-width: 600px) {
    .card {
        padding: 4rem;
    }

    .card-image {
        min-height: 15rem;
    }
    .card-header{
      padding:  4rem;
    }
}
</style>