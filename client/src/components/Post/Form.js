import React from "react";
import { Link } from "react-router-dom";
import { connect } from "react-redux";
import { savePost } from "../../actions/post";

class PostForm extends React.Component {
  constructor(props) {
    super(props);
    const { uid } = JSON.parse(localStorage.getItem("user"));

    this.state = {
      body: "",
      author: uid,
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  handleSubmit(e) {
    e.preventDefault();

    this.props.dispatch(savePost(this.state));
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <div>
          <Link
            className="profile"
            to={`/${this.state.login}`}
            style={{ marginRight: "15px" }}
          >
            <img
              className="avatarSmall"
              src="https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
              alt={`${this.state.login}`}
            />
          </Link>
          <textarea
            name="body"
            value={this.state.body}
            placeholder="Post something.."
            onChange={this.handleChange}
          />
          <input type="submit" value="Post" />
        </div>
      </form>
    );
  }
}

const mapStateToProps = (state) => ({
  posts: state.posts.posts,
  error: state.posts.error,
});

export default connect(mapStateToProps)(PostForm);
