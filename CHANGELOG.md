# Changelog

All notable changes to `linode-cli` will be documented in this file.

## v2.1.3 - 2022-09-27

### What's Changed

- Add IP Address checks by @SamuelMwangiW in https://github.com/SamuelMwangiW/linode/pull/7

**Full Changelog**: https://github.com/SamuelMwangiW/linode/compare/v2.1.2...v2.1.3

## v2.1.2 - 2022-09-27

- Fixed
- 
- Fixed `Class "LinodeServiceProvider" not found` error in 98347d235d44fbbe84558184af316b0a13d66516
- 
- **Full Changelog**: https://github.com/SamuelMwangiW/linode/compare/v2.1.1...v2.1.2
- 

## v2.1.1 - 2022-09-23

Allow `config('linode.token')` to be a callback in e0e6a16193efc25f081546177cfce08f7c94e33d

**Full Changelog**: https://github.com/SamuelMwangiW/linode/compare/v2.1.0...v2.1.1

## v2.1.0 - 2022-09-23

- Remove static from methods in `SamuelMwangiW\Linode\Linode`. `__callStatic` has been introduced to avoid breaking changes.
- To use the same behaviour, it is now recommended to use the Facade instead `SamuelMwangiW\Linode\Facades\Linode`

**Full Changelog**: https://github.com/SamuelMwangiW/linode/compare/v2.0.0...v2.1.0

## Switch to Saloon - 2022-09-23

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.1 to 1.3.3 by @dependabot in https://github.com/SamuelMwangiW/linode/pull/3
- Switch to Saloon by @SamuelMwangiW in https://github.com/SamuelMwangiW/linode/pull/4
- Added Phpstan by @SamuelMwangiW in https://github.com/SamuelMwangiW/linode/pull/5
- Update Docs by @SamuelMwangiW in https://github.com/SamuelMwangiW/linode/pull/6

**Full Changelog**: https://github.com/SamuelMwangiW/linode/compare/v1.0.0...v2.0.0

## 1.0.0 - 202X-XX-XX

- initial release
