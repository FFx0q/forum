import React, {useState} from 'react'
import {Button, TextField, Card, CardHeader, Avatar} from '@material-ui/core'
import config from '../../config.json'

export default () => {
    const [body, setBody] = useState("")
    const [isError, setIsError] = useState(false);

    const post = () => {
        if (body.length === 0) {
            setIsError(true);
            return
        }
        fetch(`${config.api_url}/posts`, {
            method: 'POST',
            body: JSON.stringify({
                body,
                author: JSON.parse(localStorage.getItem('user'))['user']['uid']
            })
        }).catch(e => setIsError(true))
    }

    return (
        <form>
            <Card>
                <CardHeader
                    avatar={
                        <Avatar src={''}/>
                    }
                    title={
                        <TextField
                            style={{width: 450}}
                            multiline
                            name={'body'}
                            value={body}
                            onChange={e => setBody(e.target.value)}
                        />
                    }
                    subheader={
                        <Button onClick={post} variant="contained" style={{marginTop: 16}}>Post</Button>
                    }
                />
            </Card>
            { isError && <span>Failed to add post!</span> }
        </form>
    )
}