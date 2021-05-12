<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="well well-sm">
        <form action="index.php" method="post">
          <input type="hidden" name="section" value="contact-us" />
          <input type="hidden" name="action" value="submit" />
          <?= $pageObj->title ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">
                  Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">
                    Message</label>
                  <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                  Send Message</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <form>
        <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
        <address>
          <strong>Twitter, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          <abbr title="Phone">
            P:</abbr>
          (123) 456-7890
        </address>
        <address>
          <strong>Full Name</strong><br>
          <a href="mailto:#">first.last@example.com</a>
        </address>
      </form>
    </div>
  </div>
</div>