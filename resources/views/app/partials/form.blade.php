<div class="row">
    <div class="col-md-9 center-col last-paragraph-no-margin">
        <form method="POST" action="{{ url('send-inquiry') }}">
            {{ csrf_field() }}
            {{ HiddenCaptcha::render('captcha') }}
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="name" placeholder="Vaše ime *" autocomplete="off" required>
                </div>
                <div class="col-md-12">
                    <input type="email" name="email" placeholder="Vaš e-mail *" autocomplete="off"  required>
                </div>
                <div class="col-md-12">
                    <textarea name="message" placeholder="Vaša poruka *" rows="6" autocomplete="off" spellcheck="false" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-large btn-block">Pošaljite upit</button>
                </div>
            </div>
        </form>
    </div>
</div>