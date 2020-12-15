import React, { Component } from 'react'

import {Post, PostContainer} from "./components/Post";
import {Loader} from "./components/Common/Loader";
import {Header} from "./components/Header/Header";

export class Posts extends Component  {
    constructor(props) {
        super(props);

        this.state = {
            error: null,
            isLoaded: false,
            posts: []
        }
    }

    componentDidMount() {
        fetch('http://localhost:8080/v0/post')
            .then(r => r.json())
            .then(r => {
                this.setState({
                    isLoaded: true,
                    posts: r['data']
                })
            }, error => {
                this.setState({
                    isLoaded: true,
                    error
                })
            })
    }

    render() {
        const { isLoaded, error, posts } = this.state

        if (error) console.error(error)
        if (!isLoaded) return <Loader />

        return (
            <>
                <Header />
                <PostContainer>
                    {posts.map(p => (
                        <div key={p.id}>
                            <Post posts={p} />
                        </div>
                    ))}
                </PostContainer>
            </>
        )
    }
}