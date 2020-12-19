import React from 'react'
import {Container, Grid, Typography} from '@material-ui/core'
import { LoginForm, RegisterForm } from '../components/Auth'
import {Header} from '../components/Layout/Header'

export default () => {
    return (
        <Container>
            <Header />
            <div style={{ padding: 32, margin: 'auto', maxWidth: 960 }}>
                <Grid container alignItems="flex-start" spacing={2}>
                    <Grid item xs={6}>
                        <Typography variant={'h4'}>Already have an account?</Typography>
                        <LoginForm />
                    </Grid>
                    <Grid item xs={6}>
                        <Typography variant={'h4'}>Create an account</Typography>
                        <RegisterForm />
                    </Grid>
                </Grid>
            </div>
        </Container>
    )
}