import React, {useState} from 'react'
import { Redirect } from "react-router-dom";
import {TextField, Button, Grid} from '@material-ui/core'
import {useAuth} from "../../context/auth";
import config from '../../config.json'


export default () => {
    const [isLoggedIn, setLoggedIn] = useState(false);
    const [isError, setIsError] = useState(false);
    const [login, setLogin] = useState("");
    const [password, setPassword] = useState("");
    const { setAuthToken } = useAuth();

    const postLogin = () => {
        fetch(`${config.api_url}/auth`, {
            method: 'POST',
            body: JSON.stringify({login, password})
        })
            .then(r => r.json())
            .then(r => {
                if (r.statusCode === 200) {
                    setAuthToken(r.data);
                    setLoggedIn(true);
                } else {
                    setIsError(true)
                }
            })
            .catch(e => {
                setIsError(true);
            });
    }

    if (isLoggedIn) {
        return <Redirect to="/" />;
    }

    return (
        <form>
            <div style={{ padding: 16 }}>
                <Grid container alignItems="flex-start" spacing={2}>
                    <Grid item xs={12}>
                        <TextField
                            required
                            value={login}
                            name={'login'}
                            label={'login'}
                            onChange={e => setLogin(e.target.value)}
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <TextField
                            required
                            value={password}
                            name={'password'}
                            type={'password'}
                            label={'password'}
                            onChange={e => setPassword(e.target.value)}
                        />
                    </Grid>
                    <Grid item>
                        <Button onClick={postLogin}>Login</Button>
                    </Grid>
                </Grid>
            </div>
            { isError && <span>The username or password provided were incorrect!</span> }
        </form>
    )
}