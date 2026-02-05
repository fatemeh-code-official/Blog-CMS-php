<?php
include "includes/header.php";
include "includes/db.php";

$name = '';
$email = '';
$subject = '';
$content = '';
$successContact = '';
$empty_field = '';

//Sending information by Send BTN

if (isset($_POST['send'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $content = $_POST['contact_content'];

  if (!empty($name) && !empty($email) && !empty($content)) {
    $connection->query(
      "INSERT INTO contacts (NAME, SUBJECT, CONTACT_CONTENT, USER_EMAIL)
       VALUES ('$name', '$subject', '$content', '$email')"
    );
    $successContact = 'Your question has been received successfully!';
  } else {
    $empty_field = 'Please fiil all required blanks!';
  }
}
?>

<link rel="stylesheet" href="statics/styles/contact.css">
<title>Contact</title>

<div class="contact">
  <div class="container">

    <section class="contact_intro d-flex column-flex align-items-center">
      <h1 class="main_title">Contact Us</h1>
      <p class="description">We value your opinion</p>
    </section>

    <div class="contact_section d-flex justify-content-space-between">

      <section class="contact_info d-flex column-flex">
        <div class="contact_info_item d-flex">
          <i class="fa-regular fa-house"></i>
          <div class="info">
            <address>New York</address>
            <address>Deggan Lake road 125</address>
          </div>
        </div>

        <div class="contact_info_item d-flex">
          <i class="fa-solid fa-phone"></i>
          <div class="info">
            <address><a href="tel:0098216542365">098216542365</a></address>
            <address>Mon to Fri 9am to 6pm</address>
          </div>
        </div>

        <div class="contact_info_item d-flex">
          <i class="fa-regular fa-envelope"></i>
          <div class="info">
            <address><a href="mailto:example@gmail.com">example@gmail.com</a></address>
            <address>Send us your query anytime!</address>
          </div>
        </div>
      </section>

      <!-- Contact Form -->
      <form action="contact.php"
            class="contact_form d-flex"
            id="contact_form"
            method="post">

        <div class="text_boxes d-flex column-flex">

          <?php if (!empty($successContact)): ?>
            <div class="alert_success"><?= $successContact ?></div>
          <?php endif; ?>

          <?php if (!empty($empty_field)): ?>
            <div class="alert"><?= $empty_field ?></div>
          <?php endif; ?>

          <input type="text" name="name" placeholder="Enter your name">
          <input type="text" name="subject" placeholder="Enter the subject">
          <input type="email" name="email" placeholder="Enter your email">

        </div>

        <textarea name="contact_content" placeholder="Write your opinion"></textarea>
      </form>
      <!-- End Form -->

    </div>

    <!-- Submit Button -->
    <div class="contact_button_wrapper">
      <button type="submit"
              name="send"
              form="contact_form"
              class="contact_button">
        Send message
      </button>
    </div>

  </div>
</div>

<?php include "includes/footer.php"; ?>
