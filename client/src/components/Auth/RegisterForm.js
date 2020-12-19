import React, {Component} from 'react'
import {TextField, Button, Grid} from '@material-ui/core'
import config from '../../config.json'

export default class RegisterForm extends Component {
    constructor(props) {
        super(props)

        this.state = {
            login: '',
            password: ''
        }

        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)
    }

    handleSubmit (e) {
        fetch(`${config.api_url}/users`, {
            method: 'POST',
            body: JSON.stringify(this.state)
        }).catch(e => console.error(e))
        e.preventDefault()
    }

    handleChange (e) {
        this.setState({
            [e.target.name]: e.target.value
        })
    }
    
    render() {
        return (
            <form method='POST' onSubmit={this.handleSubmit}>
                <div style={{ padding: 16 }}>
                    <Grid container alignItems="flex-start" spacing={2}>
                        <Grid item xs={12}>
                            <TextField
                                required
                                name={'login'}
                                label={'login'}
                                onChange={this.handleChange}
                            />
                        </Grid>
                        <Grid item xs={12}>
                            <TextField
                                required
                                name={'password'}
                                type={'password'}
                                label={'password'}
                                onChange={this.handleChange}

                            />
                        </Grid>
                        <Grid item xs={12}>
                            <TextField
                                required
                                name={'email'}
                                type={'email'}
                                label={'email'}
                                onChange={this.handleChange}

                            />
                        </Grid>
                        <Grid item>
                            <Button type={'submit'}>Register</Button>
                        </Grid>
                    </Grid>
                </div>
            </form>
        )
    }
}