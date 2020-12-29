import React from "react";
import { followerService } from "../../services";

class FollowButton extends React.Component {
  constructor(props) {
    super(props);

    this.follow = this.follow.bind(this);
    this.unfollow = this.unfollow.bind(this);
  }

  follow = (e) => {
    const { uid } = JSON.parse(localStorage.getItem("user"));
    const fid = e.target.value;

    followerService.add({ uid, fid }).catch((error) => console.error(error));
  };

  unfollow = (e) => {
    const { uid } = JSON.parse(localStorage.getItem("user"));
    const fid = e.target.value;

    followerService.remove({ uid, fid }).catch((error) => console.error(error));
  };

  render() {
    if (this.props.currentUser) {
      return <></>;
    }
    const { followers, user } = this.props;

    return (
      <>
        {!followers?.some((e) => user.uid === e.id) ? (
          <button
            type="submit"
            onClick={this.follow}
            value={this.props.follower.id}
          >
            Follow
          </button>
        ) : (
          <button
            type="submit"
            onClick={this.unfollow}
            value={this.props.follower.id}
          >
            Unfollow
          </button>
        )}
      </>
    );
  }
}

export default FollowButton;
