// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'fetched_index.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

FetchedIndex _$FetchedIndexFromJson(Map<String, dynamic> json) =>
    $checkedCreate(
      'FetchedIndex',
      json,
      ($checkedConvert) {
        final val = FetchedIndex(
          name: $checkedConvert('name', (v) => v as String),
          createdAt: $checkedConvert('createdAt', (v) => v as String),
          updatedAt: $checkedConvert('updatedAt', (v) => v as String),
          entries: $checkedConvert('entries', (v) => (v as num).toInt()),
          dataSize: $checkedConvert('dataSize', (v) => (v as num).toInt()),
          fileSize: $checkedConvert('fileSize', (v) => (v as num).toInt()),
          lastBuildTimeS:
              $checkedConvert('lastBuildTimeS', (v) => (v as num).toInt()),
          numberOfPendingTasks: $checkedConvert(
              'numberOfPendingTasks', (v) => (v as num).toInt()),
          pendingTask: $checkedConvert('pendingTask', (v) => v as bool),
          primary: $checkedConvert('primary', (v) => v as String?),
          replicas: $checkedConvert('replicas',
              (v) => (v as List<dynamic>?)?.map((e) => e as String).toList()),
          virtual: $checkedConvert('virtual', (v) => v as bool?),
        );
        return val;
      },
    );

Map<String, dynamic> _$FetchedIndexToJson(FetchedIndex instance) =>
    <String, dynamic>{
      'name': instance.name,
      'createdAt': instance.createdAt,
      'updatedAt': instance.updatedAt,
      'entries': instance.entries,
      'dataSize': instance.dataSize,
      'fileSize': instance.fileSize,
      'lastBuildTimeS': instance.lastBuildTimeS,
      'numberOfPendingTasks': instance.numberOfPendingTasks,
      'pendingTask': instance.pendingTask,
      if (instance.primary case final value?) 'primary': value,
      if (instance.replicas case final value?) 'replicas': value,
      if (instance.virtual case final value?) 'virtual': value,
    };
