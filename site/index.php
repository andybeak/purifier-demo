  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Demo of XSS against PHP</h1>
      <h3 class="mb-5">
        <em>See the readme.md file for details</em>
      </h3>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- Stored XSS -->
  <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Stored XSS demonstration</h2>
          <p class="lead mb-5">
            This section will include unescaped content from the file called "database_content.txt"
          </p>
          <p>
            <?php
              define('STORED_XSS_DEMO_FILE', 'database-content.txt');
              if (file_exists(STORED_XSS_DEMO_FILE)) {
                // we do not escape the contents of the file and so we are vulnerable to XSS
                echo file_get_contents(STORED_XSS_DEMO_FILE);
              } else {
                echo STORED_XSS_DEMO_FILE . ' not found.  Place this file in the directory with the readme.md file to insert script into this page.';
              }
            ?>
          </p>
        </div>
      </div>
    </div>
  </section>

    <!-- Reflected XSS -->
    <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Reflected XSS demonstration</h2>
          <p class="lead mb-5">
            Supply a GET parameter called "error" to inject script into this page.
          </p>
          <?= $_GET['error'] ?? 'No reflected XSS supplied' ?>
        </div>
      </div>
    </div>
  </section>
