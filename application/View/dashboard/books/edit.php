<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL ?>book" class="btn btn-sm btn-primary">
                            <i class="fa fa-list" aria-hidden="true"></i> Return To List
                        </a>
                    </div>
                </div>

                <div class="row">

                    <?php if (isset($_SESSION['edition_succeded'])) : ?>
                        <div class="col-md-12 alert alert-info alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Item edited.
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['edition_failed'])) : ?>
                        <div class="col-md-12 alert alert-warning alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            An error accured, try again later.
                        </div>
                    <?php endif; ?>

                </div>

                <form action="<?php echo URL . "book/update" ?>" method="POST">

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                    <input type="hidden" name="book_id" value="<?php echo $book->id  ?? '' ?>">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="x_panel">

                                        <div class="x_content">

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" value="<?php echo $_SESSION['validated']['title'] ?? $book->title ?? '' ?>" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['title'] ?? '' ?></span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php

unset(
    $_SESSION['validated'],
    $_SESSION['errors'],
    $_SESSION['title'],
    $_SESSION['edition_succeded'],
    $_SESSION['edition_failed'],
);
