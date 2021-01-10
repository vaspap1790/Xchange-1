<footer class="page-footer">
    <div class="container">
        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5 mb-3">
            <!-- Grid column -->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="aboutus.html" target="_blank">About US</a>
                </h6>
            </div>
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="board.html" target="_blank">Faq</a>
                </h6>
            </div>
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                <a  target="_blank" type="button" data-target="#contactModal" data-toggle="modal">Contact</a>
                </h6>
            </div>
        </div>
        <!-- Grid row-->
        <hr class="rgba-white-light" style="margin: 0 15%;">
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
            <!-- Grid column -->
            <div class="col-md-8 col-12 mt-5">
                <p style="font-family: 'Raleway', sans-serif; line-height: 1.7rem">At <span
                        style="color: #d9534f;"><b>Xchange</b></span>, we breathe new life into one-of-a-kind items. Our
                    quality will shatter your idea of "thrift", and our unbelievable selection of everyday items will
                    help you find anything you
                    need.We care about finding good homes for things and keeping them out of landfills. It’s not just a
                    transaction...</p>
            </div>
        </div>
        <!-- Grid row-->
        <hr class="clearfix rgba-white-light" style="margin: 10% 15% 5%;">
        <div class="row pb-3" style="margin: 5% 35% 10% ;">
            <!-- Grid column -->
            <div class="col-md-12">
                <!-- Grid column -->
            </div>
            <!-- Grid row-->
        </div>
    </div>
</footer>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  
  <?php
    $errors = [];
    $errorMessage = '';

    if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'xchangedve@gmail.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: index.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
  }

    ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="contactForm" action="index.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name:">
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea rows="4" cols="140" class="form-control" id="message" name="message" placeholder="Message" ></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitForm" id="submitForm" class="btn btn-primary">Submit</button>
          </div>
          </div>
        </form>
      </div>
    </div>
</div>