# -*- coding: utf-8 -*-


class XledException(IOError):
    def __init__(self, *args, **kwargs):
        super(XledException, self).__init__(*args, **kwargs)


class ApplicationError(XledException):
    """Application didn't return successful status code"""


class ValidationError(XledException):
    """Validation of challenge response wasn't successful"""


class AuthenticationError(XledException):
    """Authentication handshake wasn't successful"""


class TokenExpiredError(XledException):
    """Token is no longer valid"""


class HighInterfaceError(XledException):
    """High level interface error"""
