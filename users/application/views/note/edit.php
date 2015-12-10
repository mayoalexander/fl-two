<div class="content" style="display:none;">
    <h1>Edit a note</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php if ($this->note) { ?>
        <form method="post" action="<?php echo URL; ?>note/editSave/<?php echo $this->note->note_id; ?>">
            <label>Change text of note: </label>
            <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
            <input type="text" name="note_text" value="<?php echo htmlentities($this->note->note_text); ?>" />
            <input type="submit" value='Change' />
        </form>
    <?php } else { ?>
        <p>This note does not exist.</p>
    <?php } ?>
</div>

<h1>Your Ideas:</h1>
<p>"Ideas" are different categories for attaching your uploaded content that supports that idea. Your Ideas show up on your profile as albums, containing attached notes, music, videos, events, photos, & more.</p>
            
<div class="content row">
    <form method="post" action="<?php echo URL; ?>note/editSave/<?php echo $this->note->note_id; ?>">



        <div class="col-md-11" >
                <!-- <label>Your Idea: </label> -->
                <!-- <textarea rows='10' class="form-control idea-textarea" type="text" name="note_text" /></textarea> -->
                <textarea type="text" class="form-control idea-textarea" name="note_text"  ><?php echo htmlentities($this->note->note_text); ?></textarea>

        </div>

        <div class="col-md-1" >
            <button type="submit" value='Save' class="btn btn-success" autocomplete="off" /><i class="fa fa-save"></i></button>
        </div>

    </form>
    <!-- echo out the system feedback (error and success messages) -->
    <?php //$this->renderFeedbackMessages(); ?>
</div>
