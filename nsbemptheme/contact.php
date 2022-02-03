{% extends "base.html" %}
{% block content %}
<h1 id="contact-us">Contact Us</h1>

<?php
$HOMEPATH = str_replace("public_html", "", $_SERVER['DOCUMENT_ROOT']);
$HOMEPATH .= "phpenv.php";
require($HOMEPATH);

$customerNameError = $phoneNumberError = $emailAddressError = $messageError = "";
$customerName = $phoneNumber = $emailAddress = $message = "";

function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $customerName = cleanInput($_POST["customername"]);
    if (strlen($customerName) < 4)
    {
        $customerNameError .= "Name is required and must be at least 4 characters long. ";
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$customerName))
    {
        $customerNameError .= "Only letters and white space allowed. ";
    }

    $phoneNumber = cleanInput($_POST["phoneNumber"]);
    if (empty($phoneNumber))
    {
        $phoneNumberError = "Phone number is required. ";
    }
    if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$phoneNumber))
    {
        $phoneNumberError .= "Invalid phone number. ";
    }

    $emailAddress = cleanInput($_POST["emailAddress"]);
    if (empty($emailAddress))
    {
        $emailAddressError = "Email address is required. ";
    }
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL))
    {
        $emailAddressError .= "Invalid email format. ";
    }

    $message = cleanInput($_POST["message"]);
    if (strlen($message) < 50)
    {
        $messageError = "Message must be at least 50 characters long. ";
    }

    if (empty($customerNameError) && empty($phoneNumberError) && empty($emailAddressError) && empty($messageError))
    {
        date_default_timezone_set('America/Chicago');
        $new_line = "\r\n";
        $current_time = date("Y-m-d H:i:s");
        unset($_POST['submit']);
        $message = print_r($_POST, true);
        $message .= "Submitted " . $current_time . $new_line;
        $message .= "IP Address " . $_SERVER['REMOTE_ADDR'] . $new_line;
        $subject = "Message from NSBE-MP website" . $current_time;
        $headers = array('From' => $_POST['emailAddress']);

        if ($_POST['emailAddress'] == "tester@nsbe-mp.org") {
            $mail_result = true;
        } else {
            $mail_result = mail($HELPDESK_EMAIL, $subject, $message, $headers);
        }

        if ($mail_result) 
        {
            $customerName = $phoneNumber = $emailAddress = $message = ""; // clear form fields
            ?>
            <div class="bg-success text-light container py-2 my-5" id="successmessage">
                Your request has been submitted successfully! Please allow 2-3 business days to receive a response.
            </div>
            <?php
        } 
        else 
        {
            ?>
            <div class="bg-danger text-light container py-2 my-5" id="failuremessage">
                An error occurred when attempting to process your request.
            </div>
            <?php
        }
    }
}
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
<p><a href="tel: 3346258589">(334) 640-5405</a></p>
<h2 class="social-media">Social Media <i class="bi bi-hash"></i></h2>
<p>
    Follow or like our social media pages to get the latest information about upcoming meetings,
    events, and activities.
</p>
<p>
    <a class="btn text-white" href="https://www.facebook.com/nsbemp" target="_blank">
        <i class="bi bi-facebook"></i> Facebook</a><span> </span>
    <a class="text-white btn" href="https://www.instagram.com/nsbemp" target="_blank">
        <i class="bi bi-instagram"></i> Instagram</a><span> </span>
    <a class="text-white btn" href="https://twitter.com/nsbemp" target="_blank">
        <i class="bi bi-twitter"></i> Twitter</a>
</p>
<form method="POST" action="/contact.php">
    <p>
        <label for="customerName" class="font-weight-bold required">Name</label><br />
        <input class="form-control" name="customerName" type="text" required="required" minlength="4"  value="<?php echo $customerName; ?>" />
        <div class="bg-danger text-light" id="customerNameError"><?php echo $customerNameError; ?></div>
    </p>
    <p>
        <label for="emailAddress" class="font-weight-bold required">Email Address</label><br />
        <input class="form-control" name="emailAddress" type="email" required="required" minlength="5" value="<?php echo $emailAddress; ?>" />
        <div class="bg-danger text-light" id="emailAddressError"><?php echo $emailAddressError; ?></div>
    </p>
    <p>
        <label for="phoneNumber" class="required">Phone Number</label>
        <input class="form-control" type="tel" placeholder="Phone Number" minlength="10" name="phoneNumber" 
            maxlength="12" required="required"  value="<?php echo $phoneNumber; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <div class="text-small text-muted font-italic">Enter number in 555-555-5555 format.</div>
        <div class="bg-danger text-light" id="phoneNumberError"><?php echo $phoneNumberError; ?></div>
    </p>
    <p>
        <label for="message" class="font-weight-bold required">Message, Comment or Question</label><br />
        <textarea class="form-control" name="message" required="required" rows="5"><?php echo $message; ?></textarea>
        <div class="text-small text-muted font-italic">Minimum 50 characters. The more details, the better</div>
        <div class="bg-danger text-light" id="messageError"><?php echo $messageError; ?></div>
    </p>
    <p>
        <input type="submit" class="form-control btn" value="Submit">
    </p>
</form>

{% endblock %}