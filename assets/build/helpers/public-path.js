/* eslint-env browser */
/* globals GENESIS_ADVANCED_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (GENESIS_ADVANCED_DIST_PATH) {
  __webpack_public_path__ = GENESIS_ADVANCED_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
