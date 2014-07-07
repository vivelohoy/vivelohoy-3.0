# Vivelohoy 3.0 WordPress Theme

## Development - Getting Started

### Managing Deployment Credentials

Copy `secretsrc` to home folder as `.secretsrc` file:

    cp secretsrc ~/.secretsrc

Change permission to 700 on the `.secretsrc` file:

    chmod 700 ~/.secretsrc

Edit the .secretsrc file and fill in WP Engine Credentials. Add line to `.zshrc` to use `.secretsrc`:

    echo 'source ~/.secretsrc' >> ~/.zshrc

### Setup Deployment Tools

We're using INN's handy [deploy-tools](https://github.com/INN/deploy-tools/tree/c18e4f0a042e1f07e2f753560730e0eea5a160ae) for quick and simple local development environment setup with Vagrant and for deployment to WPEngine with Fabric. We have included their package as a submodule, so to get started please run:

    git submodule init
    git submodule update

Then you should follow [their instructions](https://github.com/INN/deploy-tools/blob/c18e4f0a042e1f07e2f753560730e0eea5a160ae/README.md#prerequisites) on setting up a Python virtual environment and installing the required Python packages to power deploy-tools:

Setup python dev environment:

    sudo easy_install pip
    sudo pip install virtualenv
    sudo pip install virtualenvwrapper
    echo 'source /usr/local/bin/virtualenvwrapper.sh' >> ~/.zshrc

Change `~/.zshrc` to the appropriate rc file for your shell. If you're using bash: `~/.bashrc`.

Open a new terminal window or tab and create a virtual environment for your project:

    mkvirtualenv vivelohoy --no-site-packages
    workon vivelohoy
    pip install -r requirements.txt
    fab verify_prerequisites

Follow their instructions on [Usage](https://github.com/INN/deploy-tools/blob/c18e4f0a042e1f07e2f753560730e0eea5a160ae/README.md#usage) on how to deploy to WPEngine and how to set up the Vagrant system. Be sure to install the local copy of WordPress as they suggest.

### Installing JS Packages with Bower

We're using [Bower](http://bower.io) to manage the JS dependencies. Once you have bower installed, change directory into the `wp-content/themes/twentythirteen-child/` folder and run:

    bower install

This will read from the `bower.json` file in the same directory and download the dependencies it finds there into a folder `bower_components`. This folder is ignored by git so it is only usable on your local system.


