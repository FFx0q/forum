<form class="form row justify-content-center" method="post">
        <div class="card col-6">
            <div class="card-body">
                <img src="/uploads/avatars/<?php echo $result['avatar_url'] ?>" class="user_avatar" />
                <div class="form-group">
                    <input type="text" name="username"  class="form-control" value="<?php echo $result['name'] ?>" />
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="<?php echo $result['email'] ?>" />
                </div>
                <div class="form-group">
                    <input type="number" name="reputation" class="form-control" value="<?php echo $result['reputation']?>" />
                </div>
                <input type="submit" class="btn btn-warning" value="Save" />
            </div>
        </div>
    </form>