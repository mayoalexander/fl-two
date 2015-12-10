<h1>Your Ideas:</h1>
<p>"Ideas" are different categories for attaching your uploaded content that supports that idea. Your Ideas show up on your profile as albums, containing attached notes, music, videos, events, photos, & more.</p>
            
<div class="content row">
    <form method="post" action="<?php echo URL;?>note/create" >


        <div class="col-md-6" >
                <!-- <label>Your Idea: </label> -->
                <textarea rows='10' class="form-control idea-textarea" type="text" name="note_text" /></textarea>
        </div>

        <div class="col-md-1" >
            <button type="submit" value='Save' class="btn btn-success" autocomplete="off" /><i class="fa fa-save"></i></button>
        </div>

        <div class="col-md-5" >
            <?php
            $config = new Blog($_SERVER['HTTP_HOST']);
            // add these stats in here somehwere in the layout
            $stats = $config->getStatsByUser($site['user']['name']);
            echo $config->display_notes($this->notes);
            ?>
        </div>
    </form>
    <!-- echo out the system feedback (error and success messages) -->
    <?php //$this->renderFeedbackMessages(); ?>
</div>
