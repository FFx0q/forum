import React from "react";
import { connect } from "react-redux";
import { fetchUser } from "../actions/user";
import { Loader, MainMenu } from "../components/Layout";
import { ProfilePosts } from "../components/Profile";

class ProfileContainer extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      login: "",
    };
  }

  componentDidMount() {
    const { login } = this.props.match.params;

    this.setState({ login });
    this.props.dispatch(fetchUser(login));
  }

  componentDidUpdate(prevProps, prevState) {
    const { login } = this.props.match.params;

    if (prevState.login !== login) {
      this.setState({ login });
      this.props.dispatch(fetchUser(login));
    }
  }

  render() {
    const { error, loading, users } = this.props;

    if (error) {
      return <div>{error.message}</div>;
    }

    return (
      <>
        <MainMenu />
        <section className="mainSection">
          {loading ? (
            <Loader />
          ) : (
            <>
              <div className="profileHeader">
                <img
                  className="avatarBig"
                  src="https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
                  alt={users.login}
                />
                <div>
                  <div className="info">
                    <h1>{users.login}</h1>
                    <div className="stats">
                      <span>
                        Posts:
                        <span>{users.posts?.length}</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <ProfilePosts {...users} />
            </>
          )}
        </section>
      </>
    );
  }
}

const mapStateToProps = (state) => ({
  users: state.user.users,
  error: state.user.error,
  loading: state.user.loading,
});

export default connect(mapStateToProps)(ProfileContainer);
