<?php

namespace CLDT\PennylaneLaravel\Exceptions;

/**
 * Thrown on HTTP 403 responses — insufficient permissions.
 */
class PennylaneAuthorizationException extends PennylaneApiException {}
