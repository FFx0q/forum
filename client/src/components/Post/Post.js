import React, {Component} from 'react'
import {AuthorAvatar, AuthorName} from "./Author";

export class Post extends Component {
    constructor(props) {
        super(props);

        this.state = {
            error: null,
            isLoaded: false,
            user: {}
        }
    }

    componentDidMount() {
        fetch(`http://localhost:8080/v0/user/${this.props.posts['author']}`)
            .then(r => r.json())
            .then(r => {
                this.setState({
                    isLoaded: true,
                    user: r['data']
                })
            }, error => {
                this.setState({
                    isLoaded: true,
                    error
                })
            })
    }

    render() {
        const { user } = this.state;

        return <>
            <>
                <AuthorAvatar src={'https://iupac.org/wp-content/uploads/2018/05/default-avatar-300x300.png'}/>
                <AuthorName href={'/'}>{user.username}</AuthorName>
                <
            </>
        </>
    }
}