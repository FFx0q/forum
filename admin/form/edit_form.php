<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group bmd-form-group">
                <input type="text" name="username"  class="form-control" value="<?= $result['name'] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <input type="password" name="password" class="form-control" placeholder="Password.." autocomplete="off"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <input type="password" name="password" class="form-control" placeholder="Password.." autocomplete="off"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <input type="text" name="email"  class="form-control" value="<?= $result['email'] ?>"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group bmd-form-group">
                <label class="control-label">Reputation</label>
                <input type="text" name="reputation" class="form-control" value="<?= $result['reputation'] ?>"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group bmd-form-group">
                <label class="control-label">Warnings</label>
                <input type="text" name="warnings" class="form-control" value="<?= $result['warnings'] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
                <input type="file" name="myfile" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
    <div class="clearfix"></div>
</form>