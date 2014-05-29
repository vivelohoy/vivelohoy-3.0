from tools.fablib import *
import os

"""
Base configuration
"""
env.project_name = 'vivelohoy-3.0'
env.file_path = '.'


# Environments
def production():
    """
    Work on production environment
    """
    env.settings = 'production'
    env.hosts = [os.environ['WPENGINE_PRODUCTION_HOST']]
    env.user = os.environ['WPENGINE_PRODUCTION_USERNAME']
    env.password = os.environ['WPENGINE_PRODUCTION_PASSWORD']


def staging():
    """
    Work on staging environment
    """
    env.settings = 'staging'
    env.hosts = [os.environ['WPENGINE_STAGING_HOST']]
    env.user = os.environ['WPENGINE_STAGING_USERNAME']
    env.password = os.environ['WPENGINE_STAGING_PASSWORD']
