<?php

namespace CLDT\PennylaneLaravel\Exceptions;

/**
 * Thrown on HTTP 429 responses — rate limit exceeded.
 */
class PennylaneRateLimitException extends PennylaneApiException {}
