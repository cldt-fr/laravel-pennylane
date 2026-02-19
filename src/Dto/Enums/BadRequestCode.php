<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

/**
 * Pennylane API bad request error codes (BadRequestCodeEnum from the OpenAPI spec).
 */
enum BadRequestCode: string
{
    case InvalidDateFormat = 'InvalidDateFormat';
    case InvalidDateTimeFormat = 'InvalidDateTimeFormat';
    case InvalidEmailFormat = 'InvalidEmailFormat';
    case InvalidPattern = 'InvalidPattern';
    case InvalidUUIDFormat = 'InvalidUUIDFormat';
    case LessThanExclusiveMinimum = 'LessThanExclusiveMinimum';
    case LessThanMinimum = 'LessThanMinimum';
    case LessThanMinItems = 'LessThanMinItems';
    case LessThanMinLength = 'LessThanMinLength';
    case MoreThanExclusiveMaximum = 'MoreThanExclusiveMaximum';
    case MoreThanMaximum = 'MoreThanMaximum';
    case MoreThanMaxItems = 'MoreThanMaxItems';
    case MoreThanMaxLength = 'MoreThanMaxLength';
    case NotAMultipartFile = 'NotAMultipartFile';
    case NotAnyOf = 'NotAnyOf';
    case NotEnumInclude = 'NotEnumInclude';
    case NotExistContentTypeDefinition = 'NotExistContentTypeDefinition';
    case NotExistDiscriminatorMappedSchema = 'NotExistDiscriminatorMappedSchema';
    case NotExistDiscriminatorPropertyName = 'NotExistDiscriminatorPropertyName';
    case NotExistPropertyDefinition = 'NotExistPropertyDefinition';
    case NotExistRequiredKey = 'NotExistRequiredKey';
    case NotExistStatusCodeDefinition = 'NotExistStatusCodeDefinition';
    case NotNullError = 'NotNullError';
    case NotOneOf = 'NotOneOf';
    case ValidateError = 'ValidateError';
}
