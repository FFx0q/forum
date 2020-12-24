import React from "react";
import { connect } from "react-redux";
import { fetchUser } from "../actions/user";
import { Loader, MainMenu } from "../components/Layout";
import { ProfilePosts} from "../components/Profile";

class ProfileContainer extends React.Component {
  constructor(props) {
    super(props);
  }

  componentDidMount() {
    const { login } = this.props.match.params;
    this.props.dispatch(fetchUser(login));
  }

  render() {
    const { error, loading, users } = this.props;
    const { posts } = users;

    return (
      <>
        <MainMenu />
        <section className={"mainSection"}>
          {loading ? (
            <Loader />
          ) : (
            <div className={"profileHeader"}>
              <img
                className={"avatarBig"}
                src={
                  "https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
                }
                alt={users.login}
              />
              <div>
                <div className={"info"}>
                  <h1>{users.login}</h1>
                  <div className={"stats"}>
              <span>
                Posts: <span>{users.posts?.length}</span>
              </span>
                  </div>
                </div>
              </div>
            </div>
          )}
          <ProfilePosts {...users} />
          {error && <div>{error}</div>}
        </section>
      </>
    )
  }
}

const mapStateToProps = (state) => {
  return {
    users: state.user.users,
    error: state.user.error,
    pending: state.user.pending,
  };
};

export default connect(mapStateToProps)(ProfileContainer);
