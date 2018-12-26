#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""Module for querying and controlling twinkly devices."""



import argparse
import sys
import xled.control

# Functions for use on command line
def switch_off(args):
    """Switch off the twinkly lights.

    Args:
        args (argparse): Argparse object containing required variables from command line

    """
    
    control_interface = xled.control.ControlInterface(args.twinkly_ip)
    control_interface.set_mode("off")
    response = control_interface.get_mode()

    print(response)

def switch_on(args):
    """Switch on the twinkly lights.

    Args:
        args (argparse): Argparse object containing required variables from command line

    """
    control_interface = xled.control.ControlInterface(args.twinkly_ip)
    control_interface.set_mode("movie")
    response = control_interface.get_mode()

    print(response)

def mode_demo(args):
    """Demo mode on the twinkly lights.

    Args:
        args (argparse): Argparse object containing required variables from command line
    """
    
    control_interface = xled.control.ControlInterface(args.twinkly_ip)
    control_interface.set_mode("demo")
    response = control_interface.get_mode()
    
    print(response)

def main():
    """Main method for the script."""
    parser = argparse.ArgumentParser(description='Twinkly device control',
                                     formatter_class=argparse.ArgumentDefaultsHelpFormatter)

    required_flags = parser.add_mutually_exclusive_group(required=True)

    # Required flags go here.
    required_flags.add_argument('--twinkly_ip',
                                help='IP Address of the Twinkly device.')


    subparsers = parser.add_subparsers()

    switch_off_parser = subparsers.add_parser('switch_off', help='Switch off the Twinkly device')
    switch_off_parser.set_defaults(func=switch_off)
    
    switch_on_parser = subparsers.add_parser('switch_on', help='Switch on the Twinkly device')
    switch_on_parser.set_defaults(func=switch_on)
    
    mode_demo_parser = subparsers.add_parser('mode_demo', help='Demo mode on the Twinkly device')
    mode_demo_parser.set_defaults(func=mode_demo)

    args = parser.parse_args()

    sys.exit(args.func(args))    
    
if __name__ == '__main__':
												   
    main()
    