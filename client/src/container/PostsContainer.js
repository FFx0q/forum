import React from "react";
import { connect } from "react-redux";
import { fetchPosts } from "../actions/post";
import { Loader, MainMenu } from "../components/Layout";
import { Post, PostForm } from "../components/Post";

class PostsContainer extends React.Component {
  componentDidMount() {
    this.props.dispatch(fetchPosts());
  }

  render() {
    const { error, loading, posts } = this.props;

    return (
      <>
        <MainMenu />
        <section className="mainSection">
          <PostForm />
          {!loading ? (
            <Loader />
          ) : (
            <>
              {Object.keys(posts).map((post) => (
                <Post key={posts[post].id} {...posts[post]} />
              ))}
            </>
          )}
          {error && <div>{error}</div>}
        </section>
      </>
    );
  }
}

const mapStateToProps = (state) => ({
  posts: state.posts.posts,
  error: state.posts.error,
  loading: state.posts.loading,
});

export default connect(mapStateToProps)(PostsContainer);
