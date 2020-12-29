import React from "react";
import { connect } from "react-redux";
import { addFollower, removeFollower } from "../../actions/user";

class FollowButton extends React.Component {
  constructor(props) {
    super(props);

    this.follow = this.follow.bind(this);
    this.unfollow = this.unfollow.bind(this);
  }

  follow = (e) => {
    const { uid } = JSON.parse(localStorage.getItem("user"));
    const fid = e.target.value;

    this.props.dispatch(addFollower({ uid, fid }))
  };

  unfollow = (e) => {
    const { uid } = JSON.parse(localStorage.getItem("user"));
    const fid = e.target.value;

    this.props.dispatch(removeFollower({ uid, fid }))
  };

  render() {
    if (this.props.currentUser) {
      return <></>;
    }
    const { followers, user } = this.props;

    return (
      <>
        {!followers?.some((e) => user.uid === e) ? (
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


const mapStateToProps = (state) => ({
  users: state.user.users,
  error: state.user.error,
  loading: state.user.loading,
});

export default connect(mapStateToProps)(FollowButton);
