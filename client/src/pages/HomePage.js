import React from 'react'
import { Container } from '@material-ui/core';
import { Header } from '../components/Layout/Header';
import { PostListContainer } from '../components/Post';

export default () => {
    return (
        <Container>
            <Header />
            <PostListContainer />
        </Container>
    )
}