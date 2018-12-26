#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""Module for querying and controlling twinkly devices."""




import sys
import xled.control

print('test test')

print('test')
control_interface = xled.control.ControlInterface("192.168.202.33")
control_interface.set_mode("movie")
response = control_interface.get_mode()


def test_mode_off(self):
    print('test')
    control_interface = xled.control.ControlInterface("192.168.202.33")
    control_interface.set_mode("off")
    response = control_interface.get_mode()
    print(response)



def test_mode_on(self):
    control_interface = xled.control.ControlInterface("192.168.202.33")
    control_interface.set_mode("movie")
    response = control_interface.get_mode()



def test_mode_demo(self):
    control_interface = xled.control.ControlInterface("192.168.202.33")
    control_interface.set_mode("demo")
    response = control_interface.get_mode()

