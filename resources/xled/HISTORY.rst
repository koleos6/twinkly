=======
History
=======

0.5.0 (2018-12-09)
------------------

* CLI to update firmware
* Example of library call and CLI usage
* Option to select device by hostname in CLI and ping in discovery
* New HighControlInterface() to aggregate and abstract low-level calls
* CLI and HighControlInterface way to set static single color
* Other bugfixes and improvements:

  * Fix typo in CLI error message
  * Print message before discovery on CLI
  * Refactor: join consecutive strings on same line
  * Print better message after device has been discovered over CLI
  * Regenerate documentation index of a package
  * Fix typo in control.set_mode() documentation
  * Return named tuple in discover.discover()
  * Use discovery and named tuple in example of library use
  * Do not assert return value in ControlInterface.set_led_movie_full()
  * Return ApplicationResponse for ControlInterface.set_led_movie_config()
  * Return ApplicationResponse for control.ControlInterface.led_reset()
  * Remove unneeded debug message from DiscoveryInterface.__init__()

0.4.0 (2018-12-03)
------------------

* Support Python 3.6 and 3.7 including tests and documentation
* Python 3 support with pyzmq >= 17.0 and Tornado 5
* Remove redundant udplib
* Other Python 3 compatibility:

  * In Python 3+ import Mapping from collections.abc
  * Python 3 compatible encoding of discovered IP and HW address and name
  * Make xled.security.xor_strings() compatible with Python 2 and 3
  * Treat PING_MESSAGE as bytes to simplify handling Python 2 and 3

* Other bugfixes and improvements:

  * Remove mention of PyPy from docs as it wasn't ever tested on it
  * Improve robustness with sending messages from agent to interface
  * Escape display of binary challenge in debug log of xled.auth
  * Ignore (usually own) PING_MESSAGE on network when handling responses

0.3.1 (2018-11-27)
------------------

* Update changelog for version 0.3.0
* Update description in setup.py to refer to CLI
* Fix JSON payload sent to server for firmware update.

0.3.0 (2018-11-27)
------------------

* CLI interface
* Discovery interface - currently works only on Python 2
* Add support for API led/movie/full and corresponding CLI upload-movie
* New Authentication mechanism - use session
* Rename authentication module from long challenge_response_auth to auth
* Change interface of ApplicationResponse to collections.Mapping
* Python files reformatted with Black
* Other bugfixes and improvements:

  * Really show ApplicationResponse status in repr() when available
  * Catch JSONDecodeError in Python 3.5+ in ApplicationResponse
  * New shortcut method ok() of ApplicationResponse
  * Make ApplicationResponse's attribute status_code @property
  * Improve error reporting during parsing of ApplicationResponse
  * If repr() of ApplicationResponse is called parse response first
  * Check status of underlying requests' Response if requested
  * Accept requests' response as attribute to class ApplicationResponse
  * Move generate_challenge to security module
  * Unit tests for control interface
  * Run unit tests on supported python versions with tox and Travis
  * Configuration for pre-commit-hooks
  * Initial pyup configuration
  * Don't run Tox on Travis on Python 3.3
  * Update coverage

0.2.1 (2018-01-02)
------------------

* Add missing MANIFEST.in
* Configure Travis for automatic deployment to PyPI

0.2.0 (2018-01-02)
------------------

* First Python control interface.

0.1.0 (2017-12-17)
------------------

* Low level control interface.
