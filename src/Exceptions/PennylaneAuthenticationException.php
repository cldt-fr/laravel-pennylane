<?php

namespace CLDT\PennylaneLaravel\Exceptions;

/**
 * Thrown on HTTP 401 responses — invalid or missing API token.
 */
class PennylaneAuthenticationException extends PennylaneApiException {}
