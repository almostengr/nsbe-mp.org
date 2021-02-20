<?php
$HOMEPATH = str_replace("public_html", "", $_SERVER['DOCUMENT_ROOT']);
$HOMEPATH .= "phpenv.php";
require($HOMEPATH);
?>
{% extends "base.html" %}
{% block content %}
<h1 id="contact-us">Contact Us</h1>
<?php
if (isset($_POST['emailaddress']) && isset($HELPDESK_EMAIL)) {
    date_default_timezone_set('America/Chicago');
    $new_line = "\r\n";
    $current_time = date("Y-m-d H:i:s");
    $message = print_r($_POST, true);
    $message .= "Submitted " . $current_time . $new_line;
    $message .= "IP Address " . $_SERVER['REMOTE_ADDR'];
    $subject = "Request " . $current_time;
    $headers = array('From' => $_POST['emailaddress']);

    if ($_POST['emailaddress'] == "tester@nsbe-mp.org") {
        $mail_result = true;
    } else {
        $mail_result = mail($HELPDESK_EMAIL, $subject, $message, $headers);
    }

    if ($mail_result) {
?>
        <div class="bg-success text-light container py-2 my-5" id="successmessage">
            Your request has been submitted successfully! Please allow 2-3 business days to receive a response.
        </div>
    <?php
    } else {
    ?>
        <div class="bg-danger text-light container py-2 my-5" id="failuremessage">
            An error occurred when attempting to process your request.
        </div>
    <?php
    }
} else {
    ?>
    <div class="col-12 pb-4 text-center">
        <img src="/images/nsbemplogo2.jpg" alt="National Society of Black Engineers Montgomery Professionals" class="headimage">
    </div>
    <h2 class="mailing-address">Mailing Address <i class="bi bi-envelope-open"></i></h2>
    <p>
        P.O. Box 210176<br />
        Montgomery, AL 36121
    </p>
    <h2 class="phone">Phone <i class="bi bi-telephone"></i></h2>
    <p><a href="tel: 3346258589">(334) 625-8589</a></p>
    <h2 class="social-media">Social Media <i class="bi bi-hash"></i></h2>
    <p>
        Follow or like our social media pages to get the latest information about upcoming meetings,
        events, and activities.
    </p>
    <p>
        <a class="btn text-white" href="https://www.facebook.com/nsbemp" target="_blank">
            <i class="fab fa-facebook"></i> Facebook</a><span> </span>
        <a class="text-white btn" href="https://www.instagram.com/nsbemp" target="_blank">
            <i class="fab fa-instagram"></i> Instagram</a><span> </span>
        <a class="text-white btn" href="https://twitter.com/nsbemp" target="_blank">
            <i class="fab fa-twitter"></i> Twitter</a>
    </p>
    <form method="POST" action="/contact.php">
        <p>
            <label for="requestorname" class="font-weight-bold required">Name</label><br />
            <input class="form-control" name="requestorname" type="text" placeholder="John Doe" required="required" minlength="4" />
        </p>
        <p>
            <label for="emailaddress" class="font-weight-bold required">Email Address</label><br />
            <input class="form-control" name="emailaddress" type="email" placeholder="visitor@nsbe-mp.org" required="required" minlength="5" />
        </p>
        <p>
            <label for="phonenumber" class="required">Phone Number</label>
            <input class="form-control" type="tel" placeholder="Phone Number" minlength="10" name="phonenumber" maxlength="12" required="required" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            <div class="text-small text-muted font-italic">Enter number in 555-555-5555 format.</div>
        </p>
        <p>
            <label for="message" class="font-weight-bold required">Message, Comment or Question</label><br />
            <textarea class="form-control" name="message" required="required" rows="5" placeholder="I have a question about NSBE MP"></textarea>
            <div class="text-small text-muted font-italic">Minimum 50 characters. The more details, the better</div>
        </p>
        <p>
            <input type="submit" class="form-control btn" value="Submit">
        </p>
    </form>
<?php
}
?>
{% endblock %}