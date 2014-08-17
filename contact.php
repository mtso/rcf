<?php include 'head.php' ?>
        <main id="contact">
            <h1>Get in touch!</h1>
            <form action="//forms.brace.io/RISDfellowship@gmail.com" method="POST">
                <div class="formline firstline">
                    <input type="text" name="name" placeholder="Your name" />
                    <input type="email" name="_replyto" placeholder="Your email" />
                </div>
                <div class="formline">
                    <textarea name="message" rows="5" placeholder="Your message..."></textarea>
                </div>
                <div class="formline" id="submit">
                    <input id="submitbutton" type="submit" value="Send!" />
                </div>
                <input type="hidden" name="_next" value="http://d.m-m.io/rcf/success.php" />
            </form>
        </main>
<?php include 'foot.php' ?>