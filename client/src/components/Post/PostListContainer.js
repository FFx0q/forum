import React, {useState, useEffect} from 'react'
import {Grid} from '@material-ui/core'
import config from '../../config.json'
import PostList from './PostList'
import PostForm from './PostForm'

export default () => {
    const [data, setData] = useState(null);
    const fetchData = () => fetch(`${config.api_url}/posts`).then(r => r.json())

    useEffect(() => {
        fetchData().then(data => setData(data['data']))
    }, []);


    return (
        <Grid container>
            <Grid item xs={12}>
                <PostForm />
            </Grid>
            <Grid item xs={12}>
                <PostList posts={data} />
            </Grid>
        </Grid>
    )
}