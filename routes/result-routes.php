<?php

return array(['route' => '/addon', 'result' => ['_route' => 'addon']],
    ['route' => '/addon/linkers', 'result' => ['_route' => 'addon_linkers']],
    ['route' => '/addon/linkers/john', 'result' => ['_route' => 'addon_linkers_linker_key', 'linker_key' => 'john']],
    ['route' => '/addon/linkers/paul/values', 'result' => ['_route' => 'addon_linkers_linker_key_values', 'linker_key' => 'paul']],
    ['route' => '/addon/linkers/george/values/ringo', 'result' => ['_route' => 'addon_linkers_linker_key_values_value_id', 'linker_key' => 'george', 'value_id' => 'ringo']],
    ['route' => '/hook_events', 'result' => ['_route' => 'hook_events']],
    ['route' => '/hook_events/john', 'result' => ['_route' => 'hook_events_subject_type', 'subject_type' => 'john']],
    ['route' => '/pullrequests/paul', 'result' => ['_route' => 'pullrequests_selected_user', 'selected_user' => 'paul']],
    ['route' => '/repositories', 'result' => ['_route' => 'repositories']],
    ['route' => '/repositories/george', 'result' => ['_route' => 'repositories_workspace', 'workspace' => 'george']],
    ['route' => '/repositories/ringo/john', 'result' => ['_route' => 'repositories_workspace_repo_slug', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/branch-restrictions', 'result' => ['_route' => 'repositories_workspace_repo_slug_branch_restrictions', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/branch-restrictions/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_branch_restrictions_id', 'workspace' => 'ringo', 'repo_slug' => 'john', 'id' => 'paul']],
    ['route' => '/repositories/george/ringo/branching-model', 'result' => ['_route' => 'repositories_workspace_repo_slug_branching_model', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/branching-model/settings', 'result' => ['_route' => 'repositories_workspace_repo_slug_branching_model_settings', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/commit/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john']],
    ['route' => '/repositories/paul/george/commit/ringo/approve', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_approve', 'workspace' => 'paul', 'repo_slug' => 'george', 'commit' => 'ringo']],
    ['route' => '/repositories/john/paul/commit/george/comments', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_comments', 'workspace' => 'john', 'repo_slug' => 'paul', 'commit' => 'george']],
    ['route' => '/repositories/ringo/john/commit/paul/comments/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_comments_comment_id', 'workspace' => 'ringo', 'repo_slug' => 'john', 'commit' => 'paul', 'comment_id' => 'george']],
    ['route' => '/repositories/ringo/john/commit/paul/properties/george/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_properties_app_key_property_name', 'workspace' => 'ringo', 'repo_slug' => 'john', 'commit' => 'paul', 'app_key' => 'george', 'property_name' => 'ringo']],
    ['route' => '/repositories/john/paul/commit/george/pullrequests', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_pullrequests', 'workspace' => 'john', 'repo_slug' => 'paul', 'commit' => 'george']],
    ['route' => '/repositories/ringo/john/commit/paul/reports', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_reports', 'workspace' => 'ringo', 'repo_slug' => 'john', 'commit' => 'paul']],
    ['route' => '/repositories/george/ringo/commit/john/reports/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john', 'reportId' => 'paul']],
    ['route' => '/repositories/george/ringo/commit/john/reports/paul/annotations', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId_annotations', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john', 'reportId' => 'paul']],
    ['route' => '/repositories/george/ringo/commit/john/reports/paul/annotations/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId_annotations_annotationId', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john', 'reportId' => 'paul', 'annotationId' => 'george']],
    ['route' => '/repositories/ringo/john/commit/paul/statuses', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_statuses', 'workspace' => 'ringo', 'repo_slug' => 'john', 'commit' => 'paul']],
    ['route' => '/repositories/george/ringo/commit/john/statuses/build', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_statuses_build', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john']],
    ['route' => '/repositories/paul/george/commit/ringo/statuses/build/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_commit_commit_statuses_build_key', 'workspace' => 'paul', 'repo_slug' => 'george', 'commit' => 'ringo', 'key' => 'john']],
    ['route' => '/repositories/paul/george/commits', 'result' => ['_route' => 'repositories_workspace_repo_slug_commits', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/commits/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_commits_revision', 'workspace' => 'ringo', 'repo_slug' => 'john', 'revision' => 'paul']],
    ['route' => '/repositories/george/ringo/components', 'result' => ['_route' => 'repositories_workspace_repo_slug_components', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/components/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_components_component_id', 'workspace' => 'john', 'repo_slug' => 'paul', 'component_id' => 'george']],
    ['route' => '/repositories/ringo/john/default-reviewers', 'result' => ['_route' => 'repositories_workspace_repo_slug_default_reviewers', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/default-reviewers/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_default_reviewers_target_username', 'workspace' => 'paul', 'repo_slug' => 'george', 'target_username' => 'ringo']],
    ['route' => '/repositories/john/paul/deploy-keys', 'result' => ['_route' => 'repositories_workspace_repo_slug_deploy_keys', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/deploy-keys/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_deploy_keys_key_id', 'workspace' => 'george', 'repo_slug' => 'ringo', 'key_id' => 'john']],
    ['route' => '/repositories/paul/george/deployments/', 'result' => ['_route' => 'repositories_workspace_repo_slug_deployments', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/deployments/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_deployments_deployment_uuid', 'workspace' => 'ringo', 'repo_slug' => 'john', 'deployment_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/deployments_config/environments/john/variables', 'result' => ['_route' => 'repositories_workspace_repo_slug_deployments_config_environments_environment_uuid_variables', 'workspace' => 'george', 'repo_slug' => 'ringo', 'environment_uuid' => 'john']],
    ['route' => '/repositories/paul/george/deployments_config/environments/ringo/variables/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_deployments_config_environments_environment_uuid_variables_variable_uuid', 'workspace' => 'paul', 'repo_slug' => 'george', 'environment_uuid' => 'ringo', 'variable_uuid' => 'john']],
    ['route' => '/repositories/paul/george/diff/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_diff_spec', 'workspace' => 'paul', 'repo_slug' => 'george', 'spec' => 'ringo']],
    ['route' => '/repositories/john/paul/diffstat/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_diffstat_spec', 'workspace' => 'john', 'repo_slug' => 'paul', 'spec' => 'george']],
    ['route' => '/repositories/ringo/john/downloads', 'result' => ['_route' => 'repositories_workspace_repo_slug_downloads', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/downloads/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_downloads_filename', 'workspace' => 'paul', 'repo_slug' => 'george', 'filename' => 'ringo']],
    ['route' => '/repositories/john/paul/environments/', 'result' => ['_route' => 'repositories_workspace_repo_slug_environments', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/environments/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_environments_environment_uuid', 'workspace' => 'george', 'repo_slug' => 'ringo', 'environment_uuid' => 'john']],
    ['route' => '/repositories/paul/george/environments/ringo/changes/', 'result' => ['_route' => 'repositories_workspace_repo_slug_environments_environment_uuid_changes', 'workspace' => 'paul', 'repo_slug' => 'george', 'environment_uuid' => 'ringo']],
    ['route' => '/repositories/john/paul/filehistory/george/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_filehistory_commit_path', 'workspace' => 'john', 'repo_slug' => 'paul', 'commit' => 'george', 'path' => 'ringo']],
    ['route' => '/repositories/john/paul/forks', 'result' => ['_route' => 'repositories_workspace_repo_slug_forks', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/hooks', 'result' => ['_route' => 'repositories_workspace_repo_slug_hooks', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/hooks/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_hooks_uid', 'workspace' => 'john', 'repo_slug' => 'paul', 'uid' => 'george']],
    ['route' => '/repositories/ringo/john/issues', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/issues/export', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_export', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/issues/export/paul-issues-george.zip', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_export_repo_name_issues_task_id_zip', 'workspace' => 'ringo', 'repo_slug' => 'john', 'repo_name' => 'paul', 'task_id' => 'george']],
    ['route' => '/repositories/ringo/john/issues/import', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_import', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/issues/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id', 'workspace' => 'paul', 'repo_slug' => 'george', 'issue_id' => 'ringo']],
    ['route' => '/repositories/john/paul/issues/george/attachments', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_attachments', 'workspace' => 'john', 'repo_slug' => 'paul', 'issue_id' => 'george']],
    ['route' => '/repositories/ringo/john/issues/paul/attachments/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_attachments_path', 'workspace' => 'ringo', 'repo_slug' => 'john', 'issue_id' => 'paul', 'path' => 'george']],
    ['route' => '/repositories/ringo/john/issues/paul/changes', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_changes', 'workspace' => 'ringo', 'repo_slug' => 'john', 'issue_id' => 'paul']],
    ['route' => '/repositories/george/ringo/issues/john/changes/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_changes_change_id', 'workspace' => 'george', 'repo_slug' => 'ringo', 'issue_id' => 'john', 'change_id' => 'paul']],
    ['route' => '/repositories/george/ringo/issues/john/comments', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_comments', 'workspace' => 'george', 'repo_slug' => 'ringo', 'issue_id' => 'john']],
    ['route' => '/repositories/paul/george/issues/ringo/comments/john', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_comments_comment_id', 'workspace' => 'paul', 'repo_slug' => 'george', 'issue_id' => 'ringo', 'comment_id' => 'john']],
    ['route' => '/repositories/paul/george/issues/ringo/vote', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_vote', 'workspace' => 'paul', 'repo_slug' => 'george', 'issue_id' => 'ringo']],
    ['route' => '/repositories/john/paul/issues/george/watch', 'result' => ['_route' => 'repositories_workspace_repo_slug_issues_issue_id_watch', 'workspace' => 'john', 'repo_slug' => 'paul', 'issue_id' => 'george']],
    ['route' => '/repositories/ringo/john/merge-base/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_merge_base_revspec', 'workspace' => 'ringo', 'repo_slug' => 'john', 'revspec' => 'paul']],
    ['route' => '/repositories/george/ringo/milestones', 'result' => ['_route' => 'repositories_workspace_repo_slug_milestones', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/milestones/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_milestones_milestone_id', 'workspace' => 'john', 'repo_slug' => 'paul', 'milestone_id' => 'george']],
    ['route' => '/repositories/ringo/john/patch/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_patch_spec', 'workspace' => 'ringo', 'repo_slug' => 'john', 'spec' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines-config/caches/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_caches', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/pipelines-config/caches/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_caches_cache_uuid', 'workspace' => 'john', 'repo_slug' => 'paul', 'cache_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines-config/caches/paul/content-uri', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_caches_cache_uuid_content_uri', 'workspace' => 'ringo', 'repo_slug' => 'john', 'cache_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/pipelines/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid', 'workspace' => 'john', 'repo_slug' => 'paul', 'pipeline_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines/paul/steps/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pipeline_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines/john/steps/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pipeline_uuid' => 'john', 'step_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines/john/steps/paul/log', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_log', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pipeline_uuid' => 'john', 'step_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines/john/steps/paul/logs/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_logs_log_uuid', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pipeline_uuid' => 'john', 'step_uuid' => 'paul', 'log_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines/paul/steps/george/test_reports', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pipeline_uuid' => 'paul', 'step_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines/paul/steps/george/test_reports/test_cases', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports_test_cases', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pipeline_uuid' => 'paul', 'step_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines/paul/steps/george/test_reports/test_cases/ringo/test_case_reasons', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports_test_cases_test_case_uuid_test_case_reasons', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pipeline_uuid' => 'paul', 'step_uuid' => 'george', 'test_case_uuid' => 'ringo']],
    ['route' => '/repositories/john/paul/pipelines/george/stopPipeline', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_stopPipeline', 'workspace' => 'john', 'repo_slug' => 'paul', 'pipeline_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines_config', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/pipelines_config/build_number', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_build_number', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines_config/schedules/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_schedules', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/pipelines_config/schedules/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_schedules_schedule_uuid', 'workspace' => 'paul', 'repo_slug' => 'george', 'schedule_uuid' => 'ringo']],
    ['route' => '/repositories/john/paul/pipelines_config/schedules/george/executions/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_schedules_schedule_uuid_executions', 'workspace' => 'john', 'repo_slug' => 'paul', 'schedule_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines_config/ssh/key_pair', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_ssh_key_pair', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/pipelines_config/ssh/known_hosts/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_ssh_known_hosts', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/pipelines_config/ssh/known_hosts/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_ssh_known_hosts_known_host_uuid', 'workspace' => 'ringo', 'repo_slug' => 'john', 'known_host_uuid' => 'paul']],
    ['route' => '/repositories/george/ringo/pipelines_config/variables/', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_variables', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/pipelines_config/variables/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_pipelines_config_variables_variable_uuid', 'workspace' => 'john', 'repo_slug' => 'paul', 'variable_uuid' => 'george']],
    ['route' => '/repositories/ringo/john/properties/paul/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_properties_app_key_property_name', 'workspace' => 'ringo', 'repo_slug' => 'john', 'app_key' => 'paul', 'property_name' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/pullrequests/activity', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_activity', 'workspace' => 'paul', 'repo_slug' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pull_request_id' => 'paul']],
    ['route' => '/repositories/george/ringo/pullrequests/john/activity', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_activity', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pull_request_id' => 'john']],
    ['route' => '/repositories/paul/george/pullrequests/ringo/approve', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_approve', 'workspace' => 'paul', 'repo_slug' => 'george', 'pull_request_id' => 'ringo']],
    ['route' => '/repositories/john/paul/pullrequests/george/comments', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_comments', 'workspace' => 'john', 'repo_slug' => 'paul', 'pull_request_id' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests/paul/comments/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_comments_comment_id', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pull_request_id' => 'paul', 'comment_id' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests/paul/commits', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_commits', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pull_request_id' => 'paul']],
    ['route' => '/repositories/george/ringo/pullrequests/john/decline', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_decline', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pull_request_id' => 'john']],
    ['route' => '/repositories/paul/george/pullrequests/ringo/diff', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_diff', 'workspace' => 'paul', 'repo_slug' => 'george', 'pull_request_id' => 'ringo']],
    ['route' => '/repositories/john/paul/pullrequests/george/diffstat', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_diffstat', 'workspace' => 'john', 'repo_slug' => 'paul', 'pull_request_id' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests/paul/merge', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_merge', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pull_request_id' => 'paul']],
    ['route' => '/repositories/george/ringo/pullrequests/john/merge/task-status/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_merge_task_status_task_id', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pull_request_id' => 'john', 'task_id' => 'paul']],
    ['route' => '/repositories/george/ringo/pullrequests/john/patch', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_patch', 'workspace' => 'george', 'repo_slug' => 'ringo', 'pull_request_id' => 'john']],
    ['route' => '/repositories/paul/george/pullrequests/ringo/request-changes', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_request_changes', 'workspace' => 'paul', 'repo_slug' => 'george', 'pull_request_id' => 'ringo']],
    ['route' => '/repositories/john/paul/pullrequests/george/statuses', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_statuses', 'workspace' => 'john', 'repo_slug' => 'paul', 'pull_request_id' => 'george']],
    ['route' => '/repositories/ringo/john/pullrequests/paul/properties/george/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_pullrequests_pullrequest_id_properties_app_key_property_name', 'workspace' => 'ringo', 'repo_slug' => 'john', 'pullrequest_id' => 'paul', 'app_key' => 'george', 'property_name' => 'ringo']],
    ['route' => '/repositories/john/paul/refs', 'result' => ['_route' => 'repositories_workspace_repo_slug_refs', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/refs/branches', 'result' => ['_route' => 'repositories_workspace_repo_slug_refs_branches', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/refs/branches/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_refs_branches_name', 'workspace' => 'john', 'repo_slug' => 'paul', 'name' => 'george']],
    ['route' => '/repositories/ringo/john/refs/tags', 'result' => ['_route' => 'repositories_workspace_repo_slug_refs_tags', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/repositories/paul/george/refs/tags/ringo', 'result' => ['_route' => 'repositories_workspace_repo_slug_refs_tags_name', 'workspace' => 'paul', 'repo_slug' => 'george', 'name' => 'ringo']],
    ['route' => '/repositories/john/paul/src', 'result' => ['_route' => 'repositories_workspace_repo_slug_src', 'workspace' => 'john', 'repo_slug' => 'paul']],
    ['route' => '/repositories/george/ringo/src/john/paul', 'result' => ['_route' => 'repositories_workspace_repo_slug_src_commit_path', 'workspace' => 'george', 'repo_slug' => 'ringo', 'commit' => 'john', 'path' => 'paul']],
    ['route' => '/repositories/george/ringo/versions', 'result' => ['_route' => 'repositories_workspace_repo_slug_versions', 'workspace' => 'george', 'repo_slug' => 'ringo']],
    ['route' => '/repositories/john/paul/versions/george', 'result' => ['_route' => 'repositories_workspace_repo_slug_versions_version_id', 'workspace' => 'john', 'repo_slug' => 'paul', 'version_id' => 'george']],
    ['route' => '/repositories/ringo/john/watchers', 'result' => ['_route' => 'repositories_workspace_repo_slug_watchers', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/snippets', 'result' => ['_route' => 'snippets']],
    ['route' => '/snippets/paul', 'result' => ['_route' => 'snippets_workspace', 'workspace' => 'paul']],
    ['route' => '/snippets/george/ringo', 'result' => ['_route' => 'snippets_workspace_encoded_id', 'workspace' => 'george', 'encoded_id' => 'ringo']],
    ['route' => '/snippets/john/paul/comments', 'result' => ['_route' => 'snippets_workspace_encoded_id_comments', 'workspace' => 'john', 'encoded_id' => 'paul']],
    ['route' => '/snippets/george/ringo/comments/john', 'result' => ['_route' => 'snippets_workspace_encoded_id_comments_comment_id', 'workspace' => 'george', 'encoded_id' => 'ringo', 'comment_id' => 'john']],
    ['route' => '/snippets/paul/george/commits', 'result' => ['_route' => 'snippets_workspace_encoded_id_commits', 'workspace' => 'paul', 'encoded_id' => 'george']],
    ['route' => '/snippets/ringo/john/commits/paul', 'result' => ['_route' => 'snippets_workspace_encoded_id_commits_revision', 'workspace' => 'ringo', 'encoded_id' => 'john', 'revision' => 'paul']],
    ['route' => '/snippets/george/ringo/files/john', 'result' => ['_route' => 'snippets_workspace_encoded_id_files_path', 'workspace' => 'george', 'encoded_id' => 'ringo', 'path' => 'john']],
    ['route' => '/snippets/paul/george/watch', 'result' => ['_route' => 'snippets_workspace_encoded_id_watch', 'workspace' => 'paul', 'encoded_id' => 'george']],
    ['route' => '/snippets/ringo/john/watchers', 'result' => ['_route' => 'snippets_workspace_encoded_id_watchers', 'workspace' => 'ringo', 'encoded_id' => 'john']],
    ['route' => '/snippets/paul/george/ringo', 'result' => ['_route' => 'snippets_workspace_encoded_id_node_id', 'workspace' => 'paul', 'encoded_id' => 'george', 'node_id' => 'ringo']],
    ['route' => '/snippets/john/paul/george/files/ringo', 'result' => ['_route' => 'snippets_workspace_encoded_id_node_id_files_path', 'workspace' => 'john', 'encoded_id' => 'paul', 'node_id' => 'george', 'path' => 'ringo']],
    ['route' => '/snippets/john/paul/george/diff', 'result' => ['_route' => 'snippets_workspace_encoded_id_revision_diff', 'workspace' => 'john', 'encoded_id' => 'paul', 'revision' => 'george']],
    ['route' => '/snippets/ringo/john/paul/patch', 'result' => ['_route' => 'snippets_workspace_encoded_id_revision_patch', 'workspace' => 'ringo', 'encoded_id' => 'john', 'revision' => 'paul']],
    ['route' => '/teams', 'result' => ['_route' => 'teams']],
    ['route' => '/teams/george', 'result' => ['_route' => 'teams_username', 'username' => 'george']],
    ['route' => '/teams/ringo/followers', 'result' => ['_route' => 'teams_username_followers', 'username' => 'ringo']],
    ['route' => '/teams/john/following', 'result' => ['_route' => 'teams_username_following', 'username' => 'john']],
    ['route' => '/teams/paul/hooks', 'result' => ['_route' => 'teams_username_hooks', 'username' => 'paul']],
    ['route' => '/teams/george/hooks/ringo', 'result' => ['_route' => 'teams_username_hooks_uid', 'username' => 'george', 'uid' => 'ringo']],
    ['route' => '/teams/john/members', 'result' => ['_route' => 'teams_username_members', 'username' => 'john']],
    ['route' => '/teams/paul/permissions', 'result' => ['_route' => 'teams_username_permissions', 'username' => 'paul']],
    ['route' => '/teams/george/permissions/repositories', 'result' => ['_route' => 'teams_username_permissions_repositories', 'username' => 'george']],
    ['route' => '/teams/ringo/permissions/repositories/john', 'result' => ['_route' => 'teams_username_permissions_repositories_repo_slug', 'username' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/teams/paul/pipelines_config/variables/', 'result' => ['_route' => 'teams_username_pipelines_config_variables', 'username' => 'paul']],
    ['route' => '/teams/george/pipelines_config/variables/ringo', 'result' => ['_route' => 'teams_username_pipelines_config_variables_variable_uuid', 'username' => 'george', 'variable_uuid' => 'ringo']],
    ['route' => '/teams/john/projects/', 'result' => ['_route' => 'teams_username_projects', 'username' => 'john']],
    ['route' => '/teams/paul/projects/george', 'result' => ['_route' => 'teams_username_projects_project_key', 'username' => 'paul', 'project_key' => 'george']],
    ['route' => '/teams/ringo/search/code', 'result' => ['_route' => 'teams_username_search_code', 'username' => 'ringo']],
    ['route' => '/teams/john/repositories', 'result' => ['_route' => 'teams_workspace_repositories', 'workspace' => 'john']],
    ['route' => '/user', 'result' => ['_route' => 'user']],
    ['route' => '/user/emails', 'result' => ['_route' => 'user_emails']],
    ['route' => '/user/emails/paul', 'result' => ['_route' => 'user_emails_email', 'email' => 'paul']],
    ['route' => '/user/permissions/repositories', 'result' => ['_route' => 'user_permissions_repositories']],
    ['route' => '/user/permissions/teams', 'result' => ['_route' => 'user_permissions_teams']],
    ['route' => '/user/permissions/workspaces', 'result' => ['_route' => 'user_permissions_workspaces']],
    ['route' => '/users/george', 'result' => ['_route' => 'users_selected_user', 'selected_user' => 'george']],
    ['route' => '/users/ringo/hooks', 'result' => ['_route' => 'users_selected_user_hooks', 'selected_user' => 'ringo']],
    ['route' => '/users/john/hooks/paul', 'result' => ['_route' => 'users_selected_user_hooks_uid', 'selected_user' => 'john', 'uid' => 'paul']],
    ['route' => '/users/george/pipelines_config/variables/', 'result' => ['_route' => 'users_selected_user_pipelines_config_variables', 'selected_user' => 'george']],
    ['route' => '/users/ringo/pipelines_config/variables/john', 'result' => ['_route' => 'users_selected_user_pipelines_config_variables_variable_uuid', 'selected_user' => 'ringo', 'variable_uuid' => 'john']],
    ['route' => '/users/paul/properties/george/ringo', 'result' => ['_route' => 'users_selected_user_properties_app_key_property_name', 'selected_user' => 'paul', 'app_key' => 'george', 'property_name' => 'ringo']],
    ['route' => '/users/john/search/code', 'result' => ['_route' => 'users_selected_user_search_code', 'selected_user' => 'john']],
    ['route' => '/users/paul/ssh-keys', 'result' => ['_route' => 'users_selected_user_ssh_keys', 'selected_user' => 'paul']],
    ['route' => '/users/george/ssh-keys/ringo', 'result' => ['_route' => 'users_selected_user_ssh_keys_key_id', 'selected_user' => 'george', 'key_id' => 'ringo']],
    ['route' => '/users/john/members', 'result' => ['_route' => 'users_username_members', 'username' => 'john']],
    ['route' => '/users/paul/repositories', 'result' => ['_route' => 'users_workspace_repositories', 'workspace' => 'paul']],
    ['route' => '/workspaces', 'result' => ['_route' => 'workspaces']],
    ['route' => '/workspaces/george', 'result' => ['_route' => 'workspaces_workspace', 'workspace' => 'george']],
    ['route' => '/workspaces/ringo/hooks', 'result' => ['_route' => 'workspaces_workspace_hooks', 'workspace' => 'ringo']],
    ['route' => '/workspaces/john/hooks/paul', 'result' => ['_route' => 'workspaces_workspace_hooks_uid', 'workspace' => 'john', 'uid' => 'paul']],
    ['route' => '/workspaces/george/members', 'result' => ['_route' => 'workspaces_workspace_members', 'workspace' => 'george']],
    ['route' => '/workspaces/ringo/members/john', 'result' => ['_route' => 'workspaces_workspace_members_member', 'workspace' => 'ringo', 'member' => 'john']],
    ['route' => '/workspaces/paul/permissions', 'result' => ['_route' => 'workspaces_workspace_permissions', 'workspace' => 'paul']],
    ['route' => '/workspaces/george/permissions/repositories', 'result' => ['_route' => 'workspaces_workspace_permissions_repositories', 'workspace' => 'george']],
    ['route' => '/workspaces/ringo/permissions/repositories/john', 'result' => ['_route' => 'workspaces_workspace_permissions_repositories_repo_slug', 'workspace' => 'ringo', 'repo_slug' => 'john']],
    ['route' => '/workspaces/paul/pipelines-config/identity/oidc/.well-known/openid-configuration', 'result' => ['_route' => 'workspaces_workspace_pipelines_config_identity_oidc_well_known_openid_configuration', 'workspace' => 'paul']],
    ['route' => '/workspaces/george/pipelines-config/identity/oidc/keys.json', 'result' => ['_route' => 'workspaces_workspace_pipelines_config_identity_oidc_keys_json', 'workspace' => 'george']],
    ['route' => '/workspaces/ringo/pipelines-config/variables', 'result' => ['_route' => 'workspaces_workspace_pipelines_config_variables', 'workspace' => 'ringo']],
    ['route' => '/workspaces/john/pipelines-config/variables/paul', 'result' => ['_route' => 'workspaces_workspace_pipelines_config_variables_variable_uuid', 'workspace' => 'john', 'variable_uuid' => 'paul']],
    ['route' => '/workspaces/george/projects', 'result' => ['_route' => 'workspaces_workspace_projects', 'workspace' => 'george']],
    ['route' => '/workspaces/ringo/projects/john', 'result' => ['_route' => 'workspaces_workspace_projects_project_key', 'workspace' => 'ringo', 'project_key' => 'john']],
    ['route' => '/workspaces/paul/search/code', 'result' => ['_route' => 'workspaces_workspace_search_code', 'workspace' => 'paul']]);
